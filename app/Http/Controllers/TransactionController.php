<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\User;
use App\Models\VirtualAccount;
use App\Models\Webkey;
use App\Models\Webtransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


class TransactionController extends Controller
{



    public function get_account_details(Request $request)
    {
        try {



            $get_key  = $request->header('Authorization');

            $main_key = $get_key;
            $substring = "Bearer ";
            $key = str_replace($substring, "", $main_key);


            $user_id = Webkey::where('key', $key)
                ->first()->user_id ?? null;

            $status = Webkey::where('key', $key)
                ->first()->status ?? null;

            if ($status == 0) {
                return response()->json([

                    'status' => false,
                    'message' => "Key is inactive",

                ], 200);
            }


            if ($status == null) {
                return response()->json([

                    'status' => false,
                    'message' => "Key not present",

                ], 200);
            }




            if ($user_id == null) {
                return response()->json([

                    'status' => false,
                    'message' => "User not found",

                ], 200);
            }


            if ($status == null) {
                return response()->json([

                    'status' => false,
                    'message' => "Key can not be empty",

                ], 200);
            }


            $get_user = User::select('main_wallet', 'v_account_no', 'v_account_name', 'v_bank_name')->where('id', $user_id)
                ->first() ?? null;


            if ($get_user == null) {
                return response()->json([

                    'status' => false,
                    'message' => "User not found",

                ], 200);
            }

            return response()->json([

                'status' => true,
                'data' => $get_user,

            ], 200);
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }


    public function webpay_view(Request $request)
    {






        // try {

        $key =  $request->key;
        $amount = $request->amount;
        $email = $request->email;
        $ref = $request->ref;
        $wc_order = $request->wc_order;
        $client_id = $request->client_id;
        $iref = $ref ?? $wc_order;






        $yeekkey = env('YEKEENKEY');


        if($key == $yeekkey){



        $user_id = Webkey::where('key', $yeekkey)->first()->user_id ?? null;
        $account_details = VirtualAccount::where('user_id', $user_id)->get();

        $account1 = 9604967850;
        $account2 = 9608026564;
        $account3 = 9607002699;
        $account4 = 9606665806;
        $account5 = 9603448473;
        $account6 = 9602742208;
        $account7 = 9601136541;
        $account8 = 9608769052;
        $account8 = 9608550087;

            $acct1 = Webtransfer::where('v_account_no', $account1)->first()->status ?? null;
            $acct2 = Webtransfer::where('v_account_no', $account2)->first()->status ?? null;
            $acct3 = Webtransfer::where('v_account_no', $account3)->first()->status ?? null;
            $acct4 = Webtransfer::where('v_account_no', $account4)->first()->status ?? null;
            $acct5 = Webtransfer::where('v_account_no', $account5)->first()->status ?? null;
            $acct6 = Webtransfer::where('v_account_no', $account6)->first()->status ?? null;
            $acct7 = Webtransfer::where('v_account_no', $account7)->first()->status ?? null;
            $acct8 = Webtransfer::where('v_account_no', $account8)->first()->status ?? null;

            if($acct1 != 0){
                $p_account_no = $account2;
            }

            elseif($acct2 != 0){
                $p_account_no = $account3;
            }
            elseif($acct3 != 0){

                $p_account_no = $account4;
            }
            elseif($acct4 != 0){
                $p_account_no = $account5;

            }elseif($acct6 != 0){

                $p_account_no = $account7;

            }
            elseif($acct7 != 0){

                $p_account_no = $account8;

            }
            else{

                $p_account_no = $account1;
            }

            $p_account_name = "ENKWAVE(WEBBLISS TECH)";
            $p_bank_name = "PROVIDUS BANK";




            $message = $p_account_name. "|" .$email. " | ".$iref ."| NGN". $amount. "|". date('d-m-y h:i:s');
            send_notification($message);


            $charge_status = Webkey::where('key', $yeekkey)->first()->charge_status ?? null;


            $marchant_url = Webkey::where('key', $yeekkey)->first()->url ?? null;


            $web_commission = Charge::where('title', 'bwebpay')->first()->amount;
            //Both Commission
            $amount1 = $web_commission / 100;
            $amount2 = $amount1 * $amount;
            $both_commmission = number_format($amount2, 2);



            if ($both_commmission >= 300) {
                $commmission = 300;
            } else {
                $commmission = $both_commmission;
            }




            $trans_id = $ref ?? random_int(100000, 999999);

            if ($charge_status == 0) {

                $payable_amount = $amount;
            } else {

                $payable_amount1 = $amount + $commmission;
                $payable_amount = round($payable_amount1);
            }





            $total_received = 0.00;

            $webhook = $marchant_url;




            $get_trans_id = Webtransfer::where('trans_id', $trans_id)
                ->first()->trans_id ?? null;


            if ($get_trans_id == null) {
                // $trans = new Webtransfer();
                // $trans->amount = $amount;
                // $trans->user_id = $user_id;
                // $trans->v_account_no = $v_account_no;
                // $trans->v_account_name = $v_account_name;
                // $trans->bank_name = $bank_name;
                // $trans->web_charges = $both_commmission;
                // $trans->trans_id = $trans_id;
                // $trans->payable_amount = $payable_amount;
                // $trans->total_received = $total_received;
                // $trans->save();

                $trans = new Webtransfer();
                $trans->amount = $amount;
                $trans->user_id = $user_id;
                $trans->v_account_no = $p_account_no;
                $trans->v_account_name = $p_account_name;
                $trans->bank_name = $p_bank_name;
                $trans->web_charges = $commmission;
                $trans->trans_id = $trans_id;
                $trans->payable_amount = $payable_amount;
                $trans->total_received = $total_received;
                $trans->wc_order = $wc_order;
                $trans->client_id = $client_id;
                $trans->save();
            }

            $qrdata = $user_id . " " . $payable_amount . " " . $trans_id;

            $data = Crypt::encryptString($qrdata);



            return view('webpay', compact('payable_amount', 'email', 'user_id', 'data', 'webhook', 'key', 'amount', 'v_account_no', 'p_account_no', 'trans_id', 'both_commmission', 'v_account_name', 'p_account_name', 'bank_name',  'p_bank_name', 'total_received'));


        }







        $marchant_url = Webkey::where('key', $key)->first()->url ?? null;

        if ($amount == null) {
            return view('invalid');
        }


        if ($ref == null) {
            return view('invalid');
        }


        if ($key == null) {
            return view('invalid');
        }

        $user_id = Webkey::where('key', $key)
            ->first()->user_id ?? null;

        if ($user_id == null) {
            return view('invalidkey');
        }


        $account_details = VirtualAccount::where('user_id', $user_id)->get();


        $charge_status = Webkey::where('key', $key)->first()->charge_status ?? null;

        $status = Webkey::where('key', $key)
            ->first()->status ?? null;

        $v_account_no = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'VFD MFB')
            ->first()->v_account_no ?? null;

        $v_account_name = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'VFD MFB')
            ->first()->v_account_name ?? null;

        $bank_name = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'VFD MFB')
            ->first()->v_bank_name ?? null;


        $p_account_no = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'PROVIDUS BANK')
            ->first()->v_account_no ?? null;

        $p_account_name = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'PROVIDUS BANK')
            ->first()->v_account_name ?? null;

        $p_bank_name = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'PROVIDUS BANK')
            ->first()->v_bank_name ?? null;

        // $web_charges = Charge::where('title', 'webcharge')
        //     ->first()->amount;




        $message = $p_account_name. "|" .$email. " | ".$iref ."| NGN". $amount. "|". date('d-m-y h:i:s');
        send_notification($message);





        $web_commission = Charge::where('title', 'bwebpay')->first()->amount;
        //Both Commission
        $amount1 = $web_commission / 100;
        $amount2 = $amount1 * $amount;
        $both_commmission = number_format($amount2, 2);



        if ($both_commmission >= 300) {
            $commmission = 300;
        } else {
            $commmission = $both_commmission;
        }




        $trans_id = $ref ?? random_int(100000, 999999);

        if ($charge_status == 0) {

            $payable_amount = $amount;
        } else {

            $payable_amount1 = $amount + $commmission;
            $payable_amount = round($payable_amount1);
        }





        $total_received = 0.00;

        $webhook = $marchant_url;




        $get_trans_id = Webtransfer::where('trans_id', $trans_id)
            ->first()->trans_id ?? null;


        if ($get_trans_id == null) {
            // $trans = new Webtransfer();
            // $trans->amount = $amount;
            // $trans->user_id = $user_id;
            // $trans->v_account_no = $v_account_no;
            // $trans->v_account_name = $v_account_name;
            // $trans->bank_name = $bank_name;
            // $trans->web_charges = $both_commmission;
            // $trans->trans_id = $trans_id;
            // $trans->payable_amount = $payable_amount;
            // $trans->total_received = $total_received;
            // $trans->save();

            $trans = new Webtransfer();
            $trans->amount = $amount;
            $trans->user_id = $user_id;
            $trans->v_account_no = $p_account_no;
            $trans->v_account_name = $p_account_name;
            $trans->bank_name = $p_bank_name;
            $trans->web_charges = $commmission;
            $trans->trans_id = $trans_id;
            $trans->payable_amount = $payable_amount;
            $trans->total_received = $total_received;
            $trans->wc_order = $wc_order;
            $trans->client_id = $client_id;
            $trans->save();
        }

        $qrdata = $user_id . " " . $payable_amount . " " . $trans_id;

        $data = Crypt::encryptString($qrdata);



        return view('webpay', compact('payable_amount', 'email', 'user_id', 'data', 'webhook', 'key', 'amount', 'v_account_no', 'p_account_no', 'trans_id', 'both_commmission', 'v_account_name', 'p_account_name', 'bank_name',  'p_bank_name', 'total_received'));
        // } catch (\Exception $th) {
        //     return $th->getMessage();
        // }
    }


    public function decline(Request $request)
    {

        $amount = $request->amount;
        $trans_id = $request->trans_id;
        $key = $request->key;



        $marchant_url = Webkey::where('key', $key)->first()->url ?? null;



        $webhook = $marchant_url . "?amount=$amount&trans_id=$trans_id&status=failed";


        Webtransfer::where('trans_id', $request->trans_id)
            ->delete();



        return view('decline', compact('webhook'));
    }




    public function check_status(Request $request)
    {



        $trans_id = $request->trans_id;
        $account_no = $request->account_no;



        $user_id = Webtransfer::where('trans_id', $trans_id)
            ->first()->user_id ?? null;

        $key = Webkey::where('user_id', $user_id)
            ->first()->key;


        $status = Webtransfer::where('trans_id', $trans_id)
            ->where('v_account_no', $account_no)
            ->first()->status ?? null;


        $amount = Webtransfer::where('trans_id', $trans_id)
            ->first()->amount;


        $amount_received = Webtransfer::where('trans_id', $trans_id)
            ->first()->total_received ?? null;

        $marchant_url = Webkey::where('key', $key)->first()->url ?? null;

        $webhook = $marchant_url . "?amount=$amount&trans_id=$trans_id&status=success";




        if ($status == 0) {

            return response()->json([

                'status' => 'pending'


            ], 200);

            //return view('success', compact('webhook'));
        }


        if ($status == 1) {

            return response()->json([

                'status' => 'success'


            ], 200);

            //return view('success', compact('webhook'));
        }





        $status = Webtransfer::where('trans_id', $trans_id)
            ->first()->status ?? null;

        $v_account_no = Webtransfer::where('trans_id', $trans_id)
            ->first()->v_account_no ?? null;

        $v_account_name = Webtransfer::where('trans_id', $trans_id)
            ->first()->v_account_name ?? null;

        $bank_name = Webtransfer::where('trans_id', $trans_id)
            ->first()->v_bank_name ?? null;

        $web_charges = Charge::where('title', 'webcharge')
            ->first()->amount;

        $amount = Webtransfer::where('trans_id', $trans_id)
            ->first()->amount;

        $payable_amount = $amount + $web_charges;

        $total_received = Webtransfer::where('trans_id', $trans_id)
            ->first()->total_received;

        $bank_name = Webtransfer::where('trans_id', $trans_id)
            ->first()->bank_name;




        return view('pending', compact('user_id', 'bank_name', 'total_received', 'trans_id', 'status', 'v_account_no', 'v_account_name', 'bank_name', 'web_charges', 'amount', 'payable_amount'));
    }






    public function success(Request $request)
    {


        $trans_id = $request->trans_id;
        $user_id = Webtransfer::where('trans_id', $trans_id)
            ->first()->user_id ?? null;

            $wc = Webtransfer::where('trans_id', $trans_id)
            ->first()->wc_order ?? null;

        $key = Webkey::where('user_id', $user_id)
            ->first()->key ?? null;



        $status = Webtransfer::where('trans_id', $trans_id)
            ->first()->status ?? null;


        $amount = Webtransfer::where('trans_id', $trans_id)
            ->first()->amount ?? 0;


        $wc_order = Webtransfer::where('trans_id', $trans_id)
            ->first()->wc_order ?? null;


        $client_id = Webtransfer::where('trans_id', $trans_id)
            ->first()->client_id ?? null;





        $amount_received = Webtransfer::where('trans_id', $trans_id)
            ->first()->total_received ?? null;

        $marchant_url = Webkey::where('key', $key)->first()->url ?? null;

        $webhook = $marchant_url . "?amount=$amount&trans_id=$trans_id&status=success&wc_order=$wc_order&client_id=$client_id" ?? null;


        $recepit = "https://web.enkpay.com/receipt?trans_id=$trans_id&amount=$amount";

        //

        return view('success', compact('webhook', 'wc', 'recepit'));
    }





    //     $status = Webtransfer::where('trans_id', $trans_id)
    //         ->first()->status ?? null;

    //     $v_account_no = Webtransfer::where('trans_id', $trans_id)
    //         ->first()->v_account_no ?? null;

    //     $v_account_name = Webtransfer::where('trans_id', $trans_id)
    //         ->first()->v_account_name ?? null;

    //     $bank_name = Webtransfer::where('trans_id', $trans_id)
    //         ->first()->v_bank_name ?? null;

    //     $web_charges = Charge::where('title', 'webcharge')
    //         ->first()->amount;

    //     $amount = Webtransfer::where('trans_id', $trans_id)
    //         ->first()->amount;

    //     $payable_amount = $amount + $web_charges;

    //     $total_received = Webtransfer::where('trans_id', $trans_id)
    //         ->first()->total_received;

    //     $bank_name = Webtransfer::where('trans_id', $trans_id)
    //         ->first()->bank_name;




    //     return view('pending', compact('user_id', 'bank_name', 'total_received', 'trans_id', 'status', 'v_account_no', 'v_account_name', 'bank_name', 'web_charges', 'amount', 'payable_amount'));
    // }






    public function get_banks()
    {

        try {


            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.errandpay.com/epagentservice/api/v1/ApiGetBanks',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(),
            ));

            $var = curl_exec($curl);

            curl_close($curl);
            $var = json_decode($var);


            $status = $var->code ?? null;

            if ($status == 200) {

                return response()->json([

                    'data' => $var->data,

                ], 200);
            }
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }






    public function resolve_providus_bank(request $request)
    {



        try {

            $bank_code = $request->bank_code;
            $account_number = $request->account_number;
            //$bvn = $request->bvn;

            $databody = array(

                'accountNumber' => $account_number,
                'beneficiaryBank' => $bank_code,
                'userName' => env('PUSERNAME'),
                'password' => env('PPASS'),

            );

            $body = json_encode($databody);
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.errandpay.com/epagentservice/api/v1/AccountNameVerification',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $body,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                ),
            ));

            $var = curl_exec($curl);
            curl_close($curl);
            $var = json_decode($var);

            $customer_name = $var->data->name ?? null;
            $error = $var->error->message ?? null;

            $status = $var->code ?? null;

            if ($status == 200) {

                return response()->json([
                    'status' => 'success',
                    'customer_name' => $customer_name,

                ], 200);
            }

            return response()->json([
                'status' => 'failed',
                'message' => $error,

            ], 500);
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }



    public function processing()
    {

        return view('processing');
    }




    public function verify_woo(request $request)
    {


        $ref = $request->trans_id;

        if ($ref != null) {


            $trx = WebTransfer::where('trans_id', $ref)->first() ?? null;

            if ($trx != null) {

                if ($trx->status == 101) {

                    return response()->json([
                        'status' => true,
                        'detail' => 'success',
                        'price' =>  $trx->amount,
                    ], 200);
                }


                return response()->json([
                    'status' => true,
                    'detail' => 'pending',
                    'price' =>  $trx->amount,
                ], 200);
            } else {

                return response()->json([
                    'status' => false,
                    'detail' => 'Transaction not found'
                ], 500);
            }
        } else {

            return response()->json([
                'status' => false,
                'detail' => 'Ref ID can not be null'
            ], 500);
        }
    }


    public function initialize_payment(Request $request)
    {


        // try {

        $key =  $request->key;
        $amount = $request->amount;
        $email = $request->email;
        $ref = $request->ref;
        $wc_order = $request->wc_order;




        $marchant_url = Webkey::where('key', $key)->first()->url ?? null;

        if ($amount == null) {
            return response()->json([
                'status' => false,
                'message' => 'Amount can not be null'
            ], 500);
        }


        if ($ref == null) {
            $ref = "ENK-" . random_int(000000, 999999);
        }


        if ($key == null) {
            return response()->json([
                'status' => false,
                'message' => 'Key can not be null'
            ], 500);
        }

        $user_id = Webkey::where('key', $key)
            ->first()->user_id ?? null;

        if ($user_id == null) {
            return response()->json([
                'status' => false,
                'message' => 'Webkey is invalid'
            ], 500);
        }


        $account_details = VirtualAccount::where('user_id', $user_id)->get();


        $charge_status = Webkey::where('key', $key)->first()->charge_status ?? null;

        $status = Webkey::where('key', $key)
            ->first()->status ?? null;

        $v_account_no = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'VFD MFB')
            ->first()->v_account_no ?? null;

        $v_account_name = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'VFD MFB')
            ->first()->v_account_name ?? null;

        $bank_name = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'VFD MFB')
            ->first()->v_bank_name ?? null;


        $p_account_no = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'PROVIDUS BANK')
            ->first()->v_account_no ?? null;

        $p_account_name = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'PROVIDUS BANK')
            ->first()->v_account_name ?? null;

        $p_bank_name = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'PROVIDUS BANK')
            ->first()->v_bank_name ?? null;

        // $web_charges = Charge::where('title', 'webcharge')
        //     ->first()->amount;



        $web_commission = Charge::where('title', 'bwebpay')->first()->amount;
        //Both Commission
        $amount1 = $web_commission / 100;
        $amount2 = $amount1 * $amount;
        $both_commmission = number_format($amount2, 3);





        $trans_id = $ref;

        if ($charge_status == 0) {

            $payable_amount = $amount;
        } else {

            $payable_amount1 = (int)$amount + (int)$both_commmission;
            $payable_amount = round($payable_amount1);
        }





        $total_received = 0.00;

        $webhook = $marchant_url;




        $get_trans_id = Webtransfer::where('trans_id', $trans_id)
            ->first()->trans_id ?? null;


        if ($get_trans_id == null) {
            // $trans = new Webtransfer();

        }

        $qrdata = $user_id . " " . $payable_amount . " " . $trans_id;

        $data = Crypt::encryptString($qrdata);


        $url = "https://web.enkpay.com/pay?amount=$amount&key=$key&ref=$trans_id";


        return response()->json([
            'status' => true,
            'data' => $url,
        ], 200);

        // } catch (\Exception $th) {
        //     return $th->getMessage();
        // }
    }




    public function custom_pay(Request $request)
    {

        if ($request->trans_id == null) {

            $trans_id = "ENK" . random_int(100000, 999999);
        }else{

            $trans_id = $request->trans_id;

        }

        if ($request->key == null) {
            $key = env('EPWEBKEY');
        } else {

            $key = $request->key;
        }


        if ($request->customer_email == null) {

            $customer_email = "info@enkpay.com";
        } else {

            $customer_email = $request->customer_email;
        }


        $uid = WebKey::where('key', $key)->first()->user_id ?? null;


        $usr = User::where('id', $uid)->first();

        $business_name = $usr->business_name ?? null;

        return view('custom-pay', compact('trans_id', 'key', 'business_name', 'customer_email'));
    }





    public function custom_pay_now(Request $request)
    {



        // try {

        $key =  $request->key;
        $amount = $request->amount;
        $email = $request->email;
        $trans_id = $request->trans_id;





        $marchant_url = Webkey::where('key', $key)->first()->url ?? null;

        if ($amount == null) {
            return view('invalid');
        }


        if ($trans_id == null) {
            return view('invalid');
        }


        if ($key == null) {
            return view('invalid');
        }

        $user_id = Webkey::where('key', $key)
            ->first()->user_id ?? null;

        if ($user_id == null) {
            return view('invalidkey');
        }


        $account_details = VirtualAccount::where('user_id', $user_id)->get();


        $charge_status = Webkey::where('key', $key)->first()->charge_status ?? null;

        $status = Webkey::where('key', $key)
            ->first()->status ?? null;

        $v_account_no = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'VFD MFB')
            ->first()->v_account_no ?? null;

        $v_account_name = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'VFD MFB')
            ->first()->v_account_name ?? null;

        $bank_name = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'VFD MFB')
            ->first()->v_bank_name ?? null;


        $p_account_no = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'PROVIDUS BANK')
            ->first()->v_account_no ?? null;

        $p_account_name = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'PROVIDUS BANK')
            ->first()->v_account_name ?? null;

        $p_bank_name = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'PROVIDUS BANK')
            ->first()->v_bank_name ?? null;

        // $web_charges = Charge::where('title', 'webcharge')
        //     ->first()->amount;



        $web_commission = Charge::where('title', 'bwebpay')->first()->amount;
        //Both Commission
        $amount1 = $web_commission / 100;
        $amount2 = $amount1 * $amount;
        $both_commmission = number_format($amount2, 2);



        if ($both_commmission >= 300) {
            $commmission = 300;
        } else {
            $commmission = $both_commmission;
        }




        $trans_id = $ref ?? random_int(100000, 999999);

        if ($charge_status == 0) {

            $payable_amount = $amount;
        } else {

            $payable_amount1 = $amount + $commmission;
            $payable_amount = round($payable_amount1);
        }





        $total_received = 0.00;

        $webhook = $marchant_url;




        $get_trans_id = Webtransfer::where('trans_id', $trans_id)
            ->first()->trans_id ?? null;


        if ($get_trans_id == null) {

            $trans = new Webtransfer();
            $trans->amount = $amount;
            $trans->user_id = $user_id;
            $trans->v_account_no = $p_account_no;
            $trans->v_account_name = $p_account_name;
            $trans->bank_name = $p_bank_name;
            $trans->web_charges = $commmission;
            $trans->trans_id = $trans_id;
            $trans->payable_amount = $payable_amount;
            $trans->wc_order = "custpay";
            $trans->total_received = $total_received;
            $trans->save();
        }

        $qrdata = $user_id . " " . $payable_amount . " " . $trans_id;

        $data = Crypt::encryptString($qrdata);



        return view('webpay', compact('payable_amount', 'email', 'user_id', 'data', 'webhook', 'key', 'amount', 'v_account_no', 'p_account_no', 'trans_id', 'both_commmission', 'v_account_name', 'p_account_name', 'bank_name',  'p_bank_name', 'total_received'));
        // } catch (\Exception $th) {
        //     return $th->getMessage();
        // }
    }



    public function receipt(Request $request)
    {

        $data['trans_id'] = $request->trans_id ?? "ENKPAY";
        $data['amount'] = $request->amount ?? 0;


        return view('receipt-view', $data);

    }
}
