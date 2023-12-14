<?php

use App\Models\User;
use App\Models\Ttmfb;
use App\Models\Setting;
use App\Models\AccountInfo;
use App\Models\VirtualAccount;
use Illuminate\Support\Facades\Auth;

if (!function_exists('send_notification')) {

    function send_notification($message)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.telegram.org/bot6140179825:AAGfAmHK6JQTLegsdpnaklnhBZ4qA1m2c64/sendMessage?chat_id=1316552414',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'chat_id' => "1316552414",
                'text' => $message,

            ),
            CURLOPT_HTTPHEADER => array(),
        ));

        $var = curl_exec($curl);
        curl_close($curl);

        $var = json_decode($var);
    }



    if (!function_exists('create_p_account')) {

        function create_p_account($name, $bvn)
        {

            $curl = curl_init();
            $data = array(
                "account_name" => $name,
                "bvn" => $bvn,
            );

            $databody = json_encode($data);
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://vps.providusbank.com/vps/api/appdevapi/api/PiPCreateReservedAccountNumber',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $databody,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Accept: application/json',
                    'Client-Id: dGVzdF9Qcm92aWR1cw==',
                    'X-Auth-Signature: b900d355dd66f3507c775ba52bcd3ba6b6f3f4093448ea24f3aa6500bbbce5c1e63c12214acd08d8057b7bec36d37a8f66a504a1b7a8df54af00ba6ba825a9c4',
                ),
            ));

            $var = curl_exec($curl);

            curl_close($curl);
            $var = json_decode($var);

            dd($var);

            $status = $var->responseCode ?? null;
            $p_acct_no = $var->account_number ?? null;
            $p_acct_name = $var->account_name ?? null;

            $pbank = "PROVIDUS BANK";

            if ($status == 00) {

                $create = new VirtualAccount();
                $create->v_account_no = $p_acct_no;
                $create->v_account_name = $p_acct_name;
                $create->v_bank_name = $pbank;
                $create->save();

                $user = User::find(Auth::id());
                $user->p_account_no = $p_acct_no;
                $user->p_account_name = $p_acct_name;
                $user->save();


                return response()->json(['account_no' => $p_acct_no,  'account_name' => $p_acct_name]);

                $message = "Account Created on Providus";
                send_notification($message);
            }


            $message = "Error from Providus Account Creation | Account Created on Providus";
            send_notification($message);
        }
    }





    if (!function_exists('create_dynamic_p_account')) {

        function create_dynamic_p_account($name, $business_id)
        {


            $client_id = env('CLIENTID');
            $hashkey = env('HASHKEY');


            $curl = curl_init();
            $data = array(
                "account_name" => $name,
            );

            $databody = json_encode($data);
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://vps.providusbank.com/vps/api/PiPCreateDynamicAccountNumber',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $databody,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Accept: application/json',
                    "Client-Id: $client_id",
                    "X-Auth-Signature: $hashkey",
                ),
            ));

            $var = curl_exec($curl);

            curl_close($curl);
            $var = json_decode($var);


            $status = $var->responseCode ?? null;
            $p_acct_no = $var->account_number ?? null;
            $p_acct_name = $var->account_name ?? null;


            $pbank = "PROVIDUS BANK";

            $usr = User::where('business_id', $business_id)->first();

            if ($status == 00) {

                $create = new VirtualAccount();
                $create->v_account_no = $p_acct_no;
                $create->v_account_name = $p_acct_name;
                $create->v_bank_name = $pbank;
                $create->business_id = $business_id ?? null;
                $create->save();

                // $user = User::find(Auth::id());
                // $user->p_account_no = $p_acct_no;
                // $user->p_account_name = $p_acct_name;
                // $user->save();

                $message = "Account Created on Providus";
                send_notification($message);


                $data_array = array();
                $data_array[0] = [
                    "account_no" => $p_acct_no,
                    "amount_name" => $p_acct_name,
                ];


                return $data_array;
            }


            $message = "Error from Providus Account Creation | Account Created on Providus";
            send_notification($message);
        }
    }
}

if (!function_exists('create_p_account')) {

    function create_p_account($name, $bvn, $business_id)
    {

        $curl = curl_init();
        $data = array(
            "account_name" => $name,
            "bvn" => $bvn,
        );

        $databody = json_encode($data);
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://vps.providusbank.com/vps/api/appdevapi/api/PiPCreateReservedAccountNumber',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $databody,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json',
                'Client-Id: dGVzdF9Qcm92aWR1cw==',
                'X-Auth-Signature: b900d355dd66f3507c775ba52bcd3ba6b6f3f4093448ea24f3aa6500bbbce5c1e63c12214acd08d8057b7bec36d37a8f66a504a1b7a8df54af00ba6ba825a9c4',
            ),
        ));

        $var = curl_exec($curl);

        curl_close($curl);
        $var = json_decode($var);

        dd($var);

        $status = $var->responseCode ?? null;
        $p_acct_no = $var->account_number ?? null;
        $p_acct_name = $var->account_name ?? null;

        $pbank = "PROVIDUS BANK";

        if ($status == 00) {

            $create = new VirtualAccount();
            $create->v_account_no = $p_acct_no;
            $create->v_account_name = $p_acct_name;
            $create->v_bank_name = $pbank;
            $create->save();

            $user = User::find(Auth::id());
            $user->p_account_no = $p_acct_no;
            $user->p_account_name = $p_acct_name;
            $user->save();


            return response()->json(['account_no' => $p_acct_no,  'account_name' => $p_acct_name]);

            $message = "Account Created on Providus";
            send_notification($message);
        }


        $message = "Error from Providus Account Creation | Account Created on Providus";
        send_notification($message);
    }
}





if (!function_exists('create_dynamic_p_account')) {

    function create_dynamic_p_account($name, $business_id)
    {
        $client_id = env('CLIENTID');
        $hashkey = env('HASHKEY');


        $curl = curl_init();
        $data = array(
            "account_name" => $name,
        );

        $databody = json_encode($data);
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://vps.providusbank.com/vps/api/PiPCreateDynamicAccountNumber',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $databody,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json',
                "Client-Id: $client_id",
                "X-Auth-Signature: $hashkey",
            ),
        ));

        $var = curl_exec($curl);

        curl_close($curl);
        $var = json_decode($var);

        dd($var);

        $status = $var->responseCode ?? null;
        $p_acct_no = $var->account_number ?? null;
        $p_acct_name = $var->account_name ?? null;

        $pbank = "PROVIDUS BANK";

        if ($status == 00) {

            $create = new VirtualAccount();
            $create->v_account_no = $p_acct_no;
            $create->v_account_name = $p_acct_name;
            $create->v_bank_name = $pbank;
            $create->save();

            $user = User::find(Auth::id());
            $user->p_account_no = $p_acct_no;
            $user->p_account_name = $p_acct_name;
            $user->save();


            return response()->json(['account_no' => $p_acct_no,  'account_name' => $p_acct_name]);

            $message = "Account Created on Providus";
            send_notification($message);
        }


        $message = "Error from Providus Account Creation | Account Created on Providus";
        send_notification($message);
    }
}



function timestamp()
{
    return substr(strval(time()), 0, 10);
}

function sha512($message)
{
    return hash('sha512', $message);
}



function trx()
{

    $refcode = "CARD" . random_int(100, 999) . date('YmdHis');


    return $refcode;
}


function resolve_bank($bank_code, $account_number)
{
    $set = Setting::where('id', 1)->first();

    if ($set->bank == 'ttmfb') {


        $customer_name = AccountInfo::where('account_no', $account_number)
            ->where('code', $bank_code)->first()->customer_name ?? null;

        if ($customer_name != null) {
            return $customer_name;
        }


        $username = env('MUSERNAME');
        $prkey = env('MPRKEY');
        $sckey = env('MSCKEY');

        $unixTimeStamp = timestamp();
        $sha = sha512($unixTimeStamp . $prkey);
        $authHeader = 'magtipon ' . $username . ':' . base64_encode(hex2bin($sha));




        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://magtipon.buildbankng.com/api/v1/bank/$bank_code/account/$account_number",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            //CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => array(
                "Authorization: $authHeader",
                "Timestamp: $unixTimeStamp",
                'Content-Type: application/json',
            ),
        ));

        $var = curl_exec($curl);
        curl_close($curl);
        $var = json_decode($var);

        // dd($var);


        $customer_name = $var->AccountName ?? null;
        $error = $var->error->message ?? null;
        $status = $var->ResponseCode ?? null;

        $bankName = Ttmfb::where('code', $bank_code)->first()->bankName;


        if($status == 10002){

            return "Account does not match with bank";

        }

        if ($status == 90000) {

            $sv = new AccountInfo();
            $sv->account_no = $account_number;
            $sv->code = $bank_code;
            $sv->bankName = $bankName;
            $sv->customer_name = $customer_name;
            $sv->save();


            return $customer_name;
        } else {

            return $var->ResponseDescription ?? "Account does not match with bank";
        }

    }

    if ($set->bank == 'manuel') {

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

            return $customer_name;
        }

        return $error;
    }

    if ($set->bank == 'pbank') {

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

            return $customer_name;
        }

        return $error;
    }


    if ($set->bank == 'vfd') {


        $customer_name = AccountInfo::where('account_no', $account_number)
            ->where('code', $bank_code)->first()->customer_name ?? null;

        if ($customer_name != null) {
            return $customer_name;
        }




        if (!empty($customer_name) || $customer_name == null) {

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

            $bankName = Ttmfb::where('code', $bank_code)->first()->bankName;

            if ($status == 200) {

                $sv = new AccountInfo();
                $sv->account_no = $account_number;
                $sv->code = $bank_code;
                $sv->bankName = $bankName;
                $sv->customer_name = $customer_name;
                $sv->save();

                return $customer_name;
            }

            return $error;
        }
    }
}
