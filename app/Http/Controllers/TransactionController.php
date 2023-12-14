<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ttmfb;
use App\Models\Charge;
use App\Models\Webkey;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\Webtransfer;
use Illuminate\Http\Request;
use App\Models\Validtransfer;
use App\Models\VirtualAccount;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;



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


        $key =  $request->key;
        $amount = $request->amount;
        $email = $request->email;
        $ref = $request->ref;
        $wc_order = $request->wc_order;
        $client_id = $request->client_id;
        $iref = $ref ?? $wc_order;
        $email = $request->email ?? "example@gmail.com";






        $user_id = Webkey::where('key', $request->key)->first()->user_id ?? null;
        $business_id = VirtualAccount::where('user_id', $user_id)->first()->business_id ?? null;





        if($business_id != null){

            if($email == null){
                $webhook = Webkey::where('key', $request->key)->first()->url ?? null;
                return Redirect::to($webhook);
            }

            $user_id = Webkey::where('key', $request->key)
                ->first()->user_id ?? null;

            $account_no_p = VirtualAccount::where('user_id', $user_id)
                ->where('v_bank_name', 'PROVIDUS BANK')->inRandomOrder()->orderBy('id', 'asc')->first()->v_account_no ?? null;

        }else {

            $user_id = Webkey::where('key', $request->key)
                ->first()->user_id ?? null;

            $account_no_p = VirtualAccount::where('user_id', $user_id)
                ->where('v_bank_name', 'PROVIDUS BANK')->first()->v_account_no ?? null;
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

        $v_account_no =  VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'VFD MFB')
            ->first()->v_account_no ?? null;

        $v_account_name = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'VFD MFB')
            ->first()->v_account_name ?? null;

        $bank_name = VirtualAccount::where('user_id', $user_id)
            ->where('v_bank_name', 'VFD MFB')
            ->first()->v_bank_name ?? null;


        $p_account_no = $account_no_p;

        $p_account_name = VirtualAccount::where('user_id', $user_id)
        ->where('v_account_no', $p_account_no)
        ->first()->v_account_name ?? null;

        $p_bank_name = VirtualAccount::where('user_id', $user_id)
            ->where('v_account_no', $p_account_no)
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

            $payable_amount1 = (int)$amount + (int)$commmission;
            $payable_amount = round($payable_amount1);
        }





        $total_received = 0.00;

        $webhook = $marchant_url;




        $get_trans_id = Webtransfer::where('trans_id', $trans_id)
            ->first()->trans_id ?? null;

        $account1 = 9604967850;
        $account2 = 9608026564;

        $cks = Webtransfer::where('v_account_no', $account1)->first()->status ?? null;
        if ($cks == 0) {
            $account2 = $v_account_no;
        }



        $url = "https://web.enkpay.com/continue-pay?amount=$amount&key=$key&ref=$trans_id&email=$email";

        $qrdata = $user_id . " " . $payable_amount . " " . $trans_id;

        $data = Crypt::encryptString($qrdata);



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
            $trans->total_received = $total_received;
            $trans->wc_order = $wc_order;
            $trans->client_id = $client_id;
            $trans->email = $email;
            $trans->url = $url;
            $trans->webhook = $webhook;
            $trans->key = $key;
            $trans->data = $data;

            $trans->both_commmission = $both_commmission;

            $trans->save();
        }



        // $message = $p_account_name . "|" . $email . " | " . $iref . "| NGN" . $amount . "|" . date('d-m-y h:i:s');
        // send_notification($message);




        return view('webpay', compact('payable_amount', 'email', 'user_id', 'data', 'webhook', 'key', 'amount', 'v_account_no', 'p_account_no', 'trans_id', 'both_commmission', 'v_account_name', 'p_account_name', 'bank_name',  'p_bank_name', 'total_received'));
        // } catch (\Exception $th) {
        //     return $th->getMessage();
        // }
    }


    // public function continue_pay(Request $request)
    // {

    //     Webtransfer::where('trans_id', $request->trans_id)->where('status', 0)->delete() ?? null;

    //     $webhook = $marchant_url . "?amount=$amount&trans_id=$trans_id&status=failed";


    //     return Redirect::to($webhook);


    //     $payable_amount = $get_trx->payable_amount;
    //     $email =  $get_trx->email;
    //     $data =  $get_trx->data;
    //     $user_id =  $get_trx->user_id;
    //     $trans_id = $get_trx->trans_id;
    //     $webhook =  $get_trx->webhook;
    //     $amount =  $get_trx->amount;
    //     $v_account_no =  $get_trx->v_account_no;
    //     $p_account_no =  $get_trx->v_account_no;
    //     $both_commmission =  $get_trx->both_commmission;
    //     $v_account_name =  $get_trx->v_account_name;
    //     $p_account_name =  $get_trx->v_account_name;
    //     $bank_name =  $get_trx->bank_name;
    //     $p_bank_name =  $get_trx->p_bank_name;
    //     $total_received =  $get_trx->total_received;
    //     $key =  $get_trx->key;
    //     return view('continue-webpay', compact('payable_amount', 'email', 'user_id', 'key', 'data', 'webhook', 'amount', 'v_account_no', 'p_account_no', 'trans_id', 'both_commmission', 'v_account_name', 'p_account_name', 'bank_name',  'p_bank_name', 'total_received'));
    // }







    public function decline(Request $request)
    {

        $amount = $request->amount;
        $trans_id = $request->trans_id;
        $key = $request->key;



        $marchant_url = Webkey::where('key', $key)->first()->url ?? null;



        Webtransfer::where('trans_id', $request->trans_id)
            ->delete();


        $webhook = $marchant_url . "?amount=$amount&trans_id=$trans_id&status=failed";
        return Redirect::to($webhook);

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


        $key = Webtransfer::where('trans_id', $trans_id)
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

        $webhook = $marchant_url . "?"."amount=$amount"."&trans_id=$trans_id"."&status=success"."&wc_order=$wc_order"."&client_id=$client_id" ?? null;


        $recepit = "https://web.enkpay.com/receipt?trans_id=$trans_id&amount=$amount";

        //

        return view('success', compact('webhook', 'marchant_url', 'amount', 'trans_id', 'wc_order', 'client_id', 'wc', 'recepit'));
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

            $set = Setting::where('id', 1)->first();

            if($set->bank == 'ttmfb'){
               $data =  Ttmfb::select('bankName', 'code')->get();
               return response()->json(['data'=> $data]);
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

            $trx = Webtransfer::where('trans_id', $ref)->first() ?? null;

            if ($trx != null) {

                if ($trx->status == 1) {

                    return response()->json([
                        'status' => true,
                        'detail' => 'success',
                        'price' =>  $trx->amount,
                    ], 200);
                }


                if ($trx->status == 0) {

                    return response()->json([
                        'status' => true,
                        'detail' => 'pending',
                        'price' =>  $trx->amount,
                    ], 200);
                }

            } else {

                return response()->json([
                    'status' => false,
                    'detail' => 'failed',
                    'message' => 'Transaction not found'
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


        $url = "https://web.enkpay.com/pay?amount=$amount&key=$key&ref=$trans_id&email=$email";


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
        } else {

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

    public function resolve_deposit(Request $request)
    {


        $session_id = $request->session_id;

        if($session_id == null){

            return response()->json([
                'status' => false,
                'message' => 'session id  cant be empty',
            ], 500);
        }


        $get_depo = Transaction::where('p_sessionId', $session_id)->first()->resolve ?? null;
        $get_amount = Transaction::where('p_sessionId', $session_id)->first()->amount ?? null;
        $trx = Transaction::where('p_sessionId', $session_id)->first()->ref_trans_id ?? null;


          if($get_depo == null ){

            return response()->json([
                'status' => false,
                'message' => "Transaction not found",
            ], 500);

        }


        if($get_depo == 0 ){

            Transaction::where('p_sessionId', $session_id)->update(['resolve' => 1]);

            return response()->json([
                'status' => true,
                'amount' => $get_amount,
                'trx' => $trx,

            ], 200);

        }

        if($get_depo == 1 ){

            return response()->json([
                'status' => false,
                'message' => "Transaction has been Resolved, NGN $get_amount has been added to your wallet",
            ], 500);

        }




    }


    public function resolve_complete(Request $request)
    {

        $order_id = $request->order_id;

        if($order_id == null){

            return response()->json([
                'status' => false,
                'message' => 'order id  cant be empty',
            ], 500);
        }


        $clear = Transaction::where('ref_trans_id', $order_id)->update(['resolve' => 1]);

        return response()->json([
            'status' => true,
            'message' => 'Transaction completely resolved',
        ], 500);

    }



    public function resolve_bank(request $request)
    {

        try {




            $bank_code = $request->bank_code;
            $account_number = $request->account_number;
            //$bvn = $request->bvn;

            $resolve = resolve_bank($bank_code, $account_number);

            return response()->json([
                'status' => true,
                'customer_name' => $resolve,
            ], 200);




        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }



}
