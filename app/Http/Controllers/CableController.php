<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CableController extends Controller
{
    public function get_cable_plan()
    {

        try {

            $client = new \GuzzleHttp\Client();
            $request = $client->get('https://vtpass.com/api/service-variations?serviceID=dstv');
            $response = $request->getBody();
            $result = json_decode($response);
            $dstv = $result->content->variations;

            $client = new \GuzzleHttp\Client();
            $request = $client->get('https://vtpass.com/api/service-variations?serviceID=gotv');
            $response = $request->getBody();
            $result = json_decode($response);
            $gotv = $result->content->variations;

            $client = new \GuzzleHttp\Client();
            $request = $client->get('https://vtpass.com/api/service-variations?serviceID=startimes');
            $response = $request->getBody();
            $result = json_decode($response);
            $startimes = $result->content->variations;

            $client = new \GuzzleHttp\Client();
            $request = $client->get('https://vtpass.com/api/service-variations?serviceID=showmax');
            $response = $request->getBody();
            $result = json_decode($response);
            $showmax = $result->content->variations;

            return response()->json([
                'status' => true,
                'dstv' => $dstv,
                'gotv' => $gotv,
                'startimes' => $startimes,
                'showmax' => $showmax,
            ], 200);

        } catch (\Exception$th) {
            return $th->getMessage();
        }

    }


    public function validate_cable(request $request)
    {

        try {

            $auth = env('VTAUTH');
            $api_key = env('APIKEY');
            $po_key = env('PKKEY');
            $sk_key = env('SKKEY');

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api-service.vtpass.com/api/merchant-verify',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'serviceID' => $request->serviceid,
                    'billersCode' => $request->biller_code,
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
            $code = $var->code ?? null;




            if($code == "000"){

                $error = $var->content->error ?? null;
                if($error != null){

                    return response()->json([
                        'status' => false,
                        'message' => $error
                    ], 422);

                }
                $data['customer_name'] = $var->content->Customer_Name;
                $data['Due_Date'] = $var->content->Due_Date;
                $data['decoder_type'] = $var->content->Customer_Type;
                $data['Current_Bouquet'] = $var->content->Current_Bouquet;
                $data['Renewal_Amount'] = $var->content->Renewal_Amount;
                return response()->json([

                    'status' => true,
                    'data' => $data

                ], 200);


            }







        } catch (\Exception$th) {
            return $th->getMessage();
        }

    }


    public function buy_cable(Request $request)
    {

        try {


            if (Auth::user()->status == 7) {


                return response()->json([

                    'status' => false,
                    'message' => 'You can not make transfer at the moment, Please contact  support',

                ], 500);
            }



            if (Auth::user()->status != 2) {

                $message = Auth::user()->first_name. " ".Auth::user()->last_name. " | Unverified Account trying to buy airtime";
                send_notification($message);

                return response()->json([
                    'status' => false,
                    'message' => 'Please verify your account to enjoy enkpay full service',
                ], 500);
            }

            $api_key = env('APIKEY');
            $po_key = env('PKKEY');
            $sk_key = env('SKKEY');


            $request_id = date('YmdHis') . Str::random(4);
            $referenceCode = "ENK-" . random_int(1000000, 999999999);
            $serviceid = $request->cable_type;
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

                    'status' => false,
                    'message' => 'Amount must not be less than NGN 100',

                ], 500);
            }

            $user_blance = Auth::user()->main_wallet;

            if ($amount > $user_blance) {
                return response()->json([
                    'status' => false,
                    'message' => 'Insufficient Funds, Fund your main wallet',
                    'balance' => $user_blance
                ], 500);

            }


            if ($amount > $user_wallet_banlance) {

                return response()->json([

                    'status' => false,
                    'message' => 'Insufficient Funds, Fund your wallet',

                ], 500);

            }

            $user_blance = Auth::user()->main_wallet;

            if ($amount > $user_blance) {
                return response()->json([
                    'status' => false,
                    'message' => 'Insufficient Funds, Fund your main wallet',
                ], 500);

            }


            if ($amount > $user_blance) {
                return response()->json([
                    'status' => false,
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
                    'billersCode' => $request->cable_number,
                    'variation_code' => $request->variation_code,
                    'amount' => $amount,
                    'phone' => $phone,
                    'quantity' => $request->number_of_month,
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
            $message = "Error Message from VAS CABLE - $get_message";

            if ($status == 'TRANSACTION SUCCESSFUL') {

                $title = "Cable VAS";
                $transaction = new Transaction();
                $transaction->user_id = Auth::id();
                $transaction->ref_trans_id = $referenceCode;
                $transaction->transaction_type = "Cable API";
                $transaction->type = "vas";
                $transaction->balance = $balance;
                $transaction->debit = $amount;
                $transaction->status = 2;
                $transaction->amount = $amount;
                $transaction->main_type = "vtpass";
                $transaction->main_type = "enkpay_vas";
                $transaction->note = "TV Subscription Purchase to $request->cable_number";
                $transaction->save();

                $update = Transaction::where('ref_trans_id', $referenceCode)
                    ->update([

                        'title' => $title,

                    ]);


                return response()->json([

                    'status' => true,
                    'message' => 'TV Subscription Purchase Successful',

                ], 200);

            }

            send_error($message);
            User::where('id', Auth::id())->increment('main_wallet', $amount);

            return response()->json([

                'status' => false,
                'message' => "Service unavailable please try again later, \n\n NGN $amount has been refunded back to your wallet",

            ], 200);

        } catch (\Exception$th) {
            return $th->getMessage();
        }

    }




}
