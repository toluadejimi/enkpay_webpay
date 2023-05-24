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

        try {

            $key =  $request->key;
            $amount = $request->amount;
            $email = $request->email;


            $marchant_url = Webkey::where('key', $key)->first()->url ?? null;

            if ($amount == null) {
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


            $status = Webkey::where('key', $key)
                ->first()->status ?? null;

            $v_account_no = VirtualAccount::where('user_id', $user_id)
                ->first()->v_account_no ?? null;

            $v_account_name = VirtualAccount::where('user_id', $user_id)
                ->first()->v_account_name ?? null;

            $bank_name = VirtualAccount::where('user_id', $user_id)
                ->first()->v_bank_name ?? null;

            $web_charges = Charge::where('title', 'webcharge')
                ->first()->amount;

            $trans_id = "WEB-" . random_int(100000, 999999);

            $payable_amount = $amount + $web_charges;

            $total_received = 0.00;

            $webhook = $marchant_url;




            $get_trans_id = Webtransfer::where('trans_id', $trans_id)
                ->first()->trans_id ?? null;


            if ($get_trans_id == null) {
                $trans = new Webtransfer();
                $trans->amount = $amount;
                $trans->user_id = $user_id;
                $trans->v_account_no = $v_account_no;
                $trans->v_account_name = $v_account_name;
                $trans->bank_name = $bank_name;
                $trans->web_charges = $web_charges;
                $trans->trans_id = $trans_id;
                $trans->payable_amount = $payable_amount;
                $trans->total_received = $total_received;
                $trans->save();
            }

            $qrdata = $user_id. " " .$payable_amount. " " .$trans_id;

            $data = Crypt::encryptString($qrdata);


            $d1 = $data;

            $decrypt= Crypt::decryptString($d1);




            $string = $decrypt; // a string

            $arrays = explode(" ", $string );
            dd($arrays, $decrypt);













            return view('webpay', compact('payable_amount', 'email', 'user_id', 'data', 'webhook', 'key', 'amount', 'v_account_no', 'trans_id', 'web_charges', 'v_account_name', 'bank_name', 'total_received'));
        } catch (\Exception $th) {
            return $th->getMessage();
        }
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


        $user_id = Webtransfer::where('trans_id', $trans_id)
            ->first()->user_id ?? null;

        $key = Webkey::where('user_id', $user_id)
            ->first()->key;


        $status = Webtransfer::where('trans_id', $trans_id)
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

        $key = Webkey::where('user_id', $user_id)
            ->first()->key;


        $status = Webtransfer::where('trans_id', $trans_id)
            ->first()->status ?? null;


        $amount = Webtransfer::where('trans_id', $trans_id)
            ->first()->amount;


        $amount_received = Webtransfer::where('trans_id', $trans_id)
            ->first()->total_received ?? null;

        $marchant_url = Webkey::where('key', $key)->first()->url ?? null;

        $webhook = $marchant_url . "?amount=$amount&trans_id=$trans_id&status=success";



            return view('success', compact('webhook'));
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



    public function resolve_bank(request $request)
    {



        try {

            $bank_code = $request->bank_code;
            $account_number = $request->account_number;
            //$bvn = $request->bvn;

            $databody = array(

                'accountNumber' => $account_number,
                'institutionCode' => $bank_code,
                'channel' => "Bank",

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
}
