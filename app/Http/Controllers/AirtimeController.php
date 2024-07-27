<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\TopupCountry;
use Illuminate\Http\Request;
use App\Models\OauthAccessToken;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class AirtimeController extends Controller
{

    public $success = true;
    public $failed = false;


    public function get_country()
    {


        $country = TopupCountry::select('name', 'code')->get();
        return response()->json([

            'status' => true,
            'countries' => $country,

        ]);
    }



    public function get_service(request $request)
    {


        if($request->country_code == null){
            return response()->json([
                'status' => false,
                'message' => "No country code passed",
            ], 422);
        }


        if ($request->code == 'NG') {

            $service = Service::select('operator_id','name')->get();

            if($service->status == 'true' ){
                return response()->json([
                    'status' => true,
                    'data' => $service,
                ], 200);

            }else{

                return response()->json([
                    'status' => false,
                    'data' => "No service available",
                ], 422);

            }



        }else{

            $code = $request->country_code;
            $service = get_services($code);

            if($service != null){

                return response()->json([
                    'status' => true,
                    'data' => $service,
                ], 200);

            }else{

                  return response()->json([
                    'status' => false,
                    'data' => "No service available",
                ], 422);


            }




        }






    }



    public function get_service_cost(request $request)
    {

        if($request->operator_id == null){
            return response()->json([
                'status' => false,
                'message' => "No Service passed",
            ], 422);
        }


        if ($request->country_code == 'NG') {

            $service = Service::select('operator_id','name')->get();

            if($service->status == 'true' ){
                return response()->json([
                    'status' => true,
                    'data' => $service,
                ], 200);


        }else{

                return response()->json([
                    'status' => false,
                    'data' => "No service available",
                ], 422);

            }



        }else{

            $operator_id = $request->operator_id;
            $service = get_services_cost($operator_id);

            if($service != null){

                return response()->json([
                    'status' => true,
                    'data' => $service,
                ], 200);

            }else{

                  return response()->json([
                    'status' => false,
                    'data' => "No service available",
                ], 422);


            }




        }






    }



    public function buy_airtime(request $request){

        $country_code = $request->country_code;
        $service_id = $request->service_id;
        $service_amount = $request->amount;
        $phone = $request->phone;
        $product_id = $request->product_id;
        $rate = $request->rate;
        $operator_id = $request->operator_id;


        $ramount = $rate * $service_amount + 100;
        $amount = $request->amount;
        $balance = check_balance($ramount);
        if($balance == false){
            return response()->json([
                'status' => false,
                'code' => "100004",
                'message' => "Insufficient Funds, Please fund your wallet",
                'balance' => number_format(Auth::user()->main_wallet, 2),

            ], 422);

        }


        if($request->country_code == "NG"){


        }else{



            $charge = charge_wallet($amount);
            $main = User::where('id', Auth::id())->first()->main_wallet;

           $updated_amount = $main - $ramount;

            $ref = refrence_code();

            if($charge == true){

                $purchase = buy_airtime($country_code, $service_id, $amount, $phone,$product_id,$rate,$operator_id);

                if($purchase['status'] == true ){

                //update Transactions
                $trasnaction = new Transaction();
                $trasnaction->user_id = Auth::id();
                $trasnaction->ref_trans_id = $ref;
                $trasnaction->e_ref = $purchase['transactionId'];
                $trasnaction->transaction_type = "FAIRTIME";
                $trasnaction->e_charges = 100;
                $trasnaction->title = "FOREIGN AIRTIME";
                $trasnaction->note = "FOREIGN AIRTIME | $phone ";
                $trasnaction->amount = $amount;
                $trasnaction->debit = $ramount;
                $trasnaction->balance = $updated_amount;
                $trasnaction->status = 1;
                $trasnaction->save();

                return response()->json([
                    'status' => true,
                    'message' => "Transaction Successful",
                    'amount' => number_format($ramount, 2),
                    'ref_id' => $ref,

                ], 200);

                }


                return response()->json([
                    'status' => false,
                    'message' => "Service not available at the moment, contact support"

                ], 200);


            }




        }

    }



    public function buy_ng_airtime(Request $request)
        {

            try {


                if (Auth::user()->status == 7) {


                    return response()->json([

                        'status' => $this->failed,
                        'message' => 'You can not make transfer at the moment, Please contact  support',

                    ], 500);
                }






                if (Auth::user()->status != 2) {

                    $message = Auth::user()->first_name. " ".Auth::user()->last_name. " | Unverified Account trying to buy airtime";
                    send_notification($message);

                    return response()->json([
                        'status' => $this->failed,
                        'message' => 'Please verify your account to enjoy enkpay full service',
                    ], 500);
                }

                $api_key = env('APIKEY');
                $po_key = env('PKKEY');
                $sk_key = env('SKKEY');


                $request_id = date('YmdHis') . Str::random(4);
                $referenceCode = "ENK-" . random_int(1000000, 999999999);
                $serviceid = $request->service_id;
                $amount = $request->amount;
                $phone = $request->phone;
                $wallet = "main_account";


                if ($wallet == 'main_account') {
                    $user_wallet_banlance = Auth::user()->main_wallet;
                } else {
                    $user_wallet_banlance = Auth::user()->bonus_wallet;;
                }


                if ($amount < 100) {

                    return response()->json([

                        'status' => $this->failed,
                        'message' => 'Amount must not be less than NGN 100',

                    ], 500);
                }

                $user_blance = Auth::user()->main_wallet;

                if ($amount > $user_blance) {
                    return response()->json([
                        'status' => $this->failed,
                        'message' => 'Insufficient Funds, Fund your main wallet',
                        'balance' => $user_blance
                    ], 500);

                }


                if ($amount > $user_wallet_banlance) {

                    return response()->json([

                        'status' => $this->failed,
                        'message' => 'Insufficient Funds, Fund your wallet',

                    ], 500);

                }

                $user_blance = Auth::user()->main_wallet;

                if ($amount > $user_blance) {
                    return response()->json([
                        'status' => $this->failed,
                        'message' => 'Insufficient Funds, Fund your main wallet',
                    ], 500);

                }


                if ($amount > $user_blance) {
                    return response()->json([
                        'status' => $this->failed,
                        'message' => 'Insufficient Funds, Fund your main wallet',
                    ], 500);

                }



                $debit = $user_wallet_banlance - $amount;

                if ($wallet == 'main_account') {

                    $update = User::where('id', Auth::id())
                        ->update([
                            'main_wallet' => $debit,
                        ]);

                } else {
                    $update = User::where('id', Auth::id())
                        ->update([
                            'bonus_wallet' => $debit,
                        ]);
                }

                if ($wallet == 'main_account') {

                    $balance = $user_wallet_banlance - $amount;

                } else {

                    $balance = $user_wallet_banlance - $amount;

                }


                $name = Auth::user()->first_name." ".Auth::user()->last_name;
                $message = $name. " Wants to buy recharge card | NGN". $amount. " | " .$phone;
                send_error($message);




                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://vtpass.com/api/pay',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array(
                        'request_id' => $request_id,
                        'serviceID' => $serviceid,
                        'amount' => $amount,
                        'phone' => $phone,
                    ),
                    CURLOPT_HTTPHEADER => array(
                        //"Authorization: Basic $auth=",
                        "api-key: $api_key",
                        "secret-key: $sk_key",
                        'Cookie: laravel_session=eyJpdiI6IlBkTGc5emRPMmhyQVwvb096YkVKV2RnPT0iLCJ2YWx1ZSI6IkNvSytPVTV5TW52K2tBRlp1R2pqaUpnRDk5YnFRbEhuTHhaNktFcnBhMFRHTlNzRWIrejJxT05kM1wvM1hEYktPT2JKT2dJWHQzdFVaYnZrRytwZ2NmQT09IiwibWFjIjoiZWM5ZjI3NzBmZTBmOTZmZDg3ZTUxMDBjODYxMzQ3OTkxN2M4YTAxNjNmMWY2YjAxZTIzNmNmNWNhOWExNzJmOCJ9',
                    ),
                ));

                $var = curl_exec($curl);
                curl_close($curl);

                $var = json_decode($var);

                $trx_id = $var->requestId ?? null;

                $get_message = $var->response_description ?? null;

                $status = $var->response_description ?? null;

                $message = "Error Mesage from VAS AIRTIME - $get_message";

                if ($status == 'TRANSACTION SUCCESSFUL') {


                    $title = "Airtime VAS";

                    $transaction = new Transaction();
                    $transaction->user_id = Auth::id();
                    $transaction->ref_trans_id = $referenceCode;
                    $transaction->transaction_type = "VasAirtime API";
                    $transaction->type = "vas";
                    $transaction->balance = $balance;
                    $transaction->debit = $amount;
                    $transaction->status = 1;
                    $transaction->amount = $amount;
                    $transaction->main_type = "vtpass";
                    $transaction->main_type = "enkpay_vas";
                    $transaction->note = "Airtime Purchase to $phone";
                    //$trasnaction->title = $title;
                    $transaction->save();

                    $update = Transaction::where('ref_trans_id', $referenceCode)
                        ->update([

                            'title' => $title,

                        ]);

                    if (!empty(user_email())) {
                        //send email
                        $data = array(
                            'fromsender' => 'noreply@enkpay.com', 'EnkPay',
                            'subject' => "Airtime Purchase",
                            'toreceiver' => user_email(),
                            'first_name' => first_name(),
                            'amount' => $amount,
                            'phone' => $phone,

                        );

                        Mail::send('emails.vas.airtime', ["data1" => $data], function ($message) use ($data) {
                            $message->from($data['fromsender']);
                            $message->to($data['toreceiver']);
                            $message->subject($data['subject']);
                        });

                    }



                    $name = Auth::user()->first_name." ".Auth::user()->last_name;
                    $message = $name. " | NGN". $amount. " | " .$phone;
                    send_error($message);

                    return response()->json([

                        'status' => $this->success,
                        'message' => 'Airtime Purchase Successful',

                    ], 200);

                }

                send_error($message);

                User::where('id', Auth::id())->increment('main_wallet', $amount);

                return response()->json([

                    'status' => $this->failed,
                    'message' => "Service unavailable please try again later, \n\n NGN $amount has been refunded back to your wallet",

                ], 200);

            } catch (\Exception$th) {
                return $th->getMessage();
            }

        }







}
