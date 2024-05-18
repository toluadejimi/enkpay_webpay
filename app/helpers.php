<?php

use App\Models\User;
use App\Models\Ttmfb;
use App\Models\Setting;
use App\Models\AccountInfo;
use Illuminate\Support\Str;
use App\Models\VirtualAccount;
use Illuminate\Support\Facades\Auth;


if (!function_exists('refxx')) {
    function refxx()
    {
        $refs = date('YmdHis');
        return $refs;
    }
}



if (!function_exists('refrence_code')) {

    function refrence_code()
    {

        $ref = "ENK|API" . random_int(1000000, 999999999) . date('his');
        return $ref;
    }
}


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


if (!function_exists('send_notification_palmpay')) {

    function send_notification_palmpay($message)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.telegram.org/bot7175616813:AAH4ibKWxm9Zx4uu9-g0udcPiZnIkm17mgM/sendMessage?chat_id=6839836232',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'chat_id' => "6839836232",
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


if (!function_exists('send_notification_opay')) {

    function send_notification_opay($message)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.telegram.org/bot6721346952:AAGASEcGM78JabVGMo1QDAMXxofUF2RoByw/sendMessage?chat_id=6776272358',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'chat_id' => "6776272358",
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


if (!function_exists('timestamp')) {

    function timestamp()
    {
        return substr(strval(time()), 0, 10);
    }

    function sha512($message)
    {
        return hash('sha512', $message);
    }
}

if (!function_exists('trx')) {

    function trx()
    {

        $refcode = "CARD" . random_int(100, 999) . date('YmdHis');
        return $refcode;
    }
}

if (!function_exists('trxref')) {

    function trxref()
    {

        $refcode = "REFERALPAY" . random_int(100, 999) . date('YmdHis');
        return $refcode;
    }
}

if (!function_exists('resolve_bank')) {

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



            $customer_name = $var->AccountName ?? null;
            $error = $var->error->message ?? null;
            $status = $var->ResponseCode ?? null;

            $bankName = Ttmfb::where('code', $bank_code)->first()->bankName;


            if ($status == 10002) {

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
}


if (!function_exists('get_services')) {

    function get_services($code)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api-service.vtpass.com/api/get-international-airtime-product-types?code=$code",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',

        ));

        $var = curl_exec($curl);

        curl_close($curl);
        $var = json_decode($var);


        $status = $var->response_description ?? null;
        $service_code = $var->content ?? null;


        if ($status == 000) {

            foreach ($service_code as $product) {

                if ($product->product_type_id == 1 || $product->product_type_id == 2) {

                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://api-service.vtpass.com/api/get-international-airtime-operators?code=$code&product_type_id=$product->product_type_id",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'GET',

                    ));

                    $var = curl_exec($curl);

                    curl_close($curl);
                    $var = json_decode($var);
                    $status = $var->response_description ?? null;
                    $result = $var->content;


                    if ($status == 000) {

                            $data = [];
                            foreach ($var->content as $item) {
                                $data[] = [
                                    'operator_id' => $item->operator_id,
                                    'name' => $item->name,
                                    'product_id' => $product->product_type_id,
                                ];
                            }

                        return $data;
                    } else {

                        return false;
                    }
                }
            }
        } else {
            return false;
        }
    }


    function get_services_cost($operator_id)
    {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api-service.vtpass.com/api/service-variations?serviceID=foreign-airtime&operator_id=$operator_id&product_type_id=1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',

        ));

        $var = curl_exec($curl);

        curl_close($curl);
        $var = json_decode($var);
        $status = $var->response_description ?? null;
        $variations = $var->content->variations ?? null;



        if ($status == 000) {




            $data = [];
            foreach ($variations as $key => $value) {

                $percentageAmount = (50 / 100) * $value->variation_rate;


                $data[] = array(
                    "product_id" => $value->variation_code,
                    "product_name" => $value->name,
                    "min" => $value->variation_amount_min,
                    "max" => $value->variation_amount_max,
                    "rate" => $value->variation_rate + $percentageAmount,
                    "fixed_price" => $value->fixedPrice,

                );
            }

            return $data;
        } else {

            return false;
        }
    }
}


if (!function_exists('buy_airtime')) {

    function buy_airtime($country_code, $service_id, $amount, $phone, $product_id, $rate, $operator_id)
    {

        $code = $country_code;
        $service = get_services($code);
        $p_id = $service['0']['product_id'];
        $request_id = refxx();


        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sandbox.vtpass.com/api/pay',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'request_id' => $request_id,
                'serviceID' => 'foreign-airtime',
                'billersCode' => $phone,
                'amount' => $amount,
                'variation_code' => $product_id,
                'phone' => $phone,
                'operator_id' => $operator_id,
                'country_code' => $country_code,
                'product_type_id' => $p_id,
                'email' => Auth::user()->email ?? "test@email.com",

            ),
            CURLOPT_HTTPHEADER => array(
                'api-key: e334b8de50dfd7dca64c02c3b46e3c1a',
                'secret-key: SK_3147aff98c2584bf32a858e9525fbe65d4c17c196ad'
            ),
        ));

        $var = curl_exec($curl);
        curl_close($curl);
        $var = json_decode($var);
        $status = $var->code ?? null;


        if ($status == 000) {

            $data['status'] = true;
            $data['amount'] = $var->content->transactions->total_amount;
            $data['transactionId'] = $var->content->transactions->transactionId;

            return $data;
        }
    }
}


if (!function_exists('check_balance')) {

    function check_balance($amount)
    {

        if (Auth::user()->main_wallet < $amount) {
            return false;
        } else {
            return true;
        }
    }
}


if (!function_exists('charge_wallet')) {


    function charge_wallet($amount)
    {

        if (Auth::user()->main_wallet < $amount) {
            User::where('id', Auth::id())->decrement('main_wallet', $amount);
            return true;
        } else {
            return true;
        }
    }
}



if (!function_exists('tokenkey')) {

    function tokenkey()
    {

        $databody = array(
            'clientId' => env('PELPAYCLIENTID'),
            'clientSecret' => env('PELPAYCLIENTSECRET'),

        );


        $post_data = json_encode($databody);



        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.pelpay.africa/api/Account/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $post_data,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $var = curl_exec($curl);
        curl_close($curl);

        $var = json_decode($var);


        return $var->access_token ?? null;

    }


    function pre_pay($amount, $first_name, $last_name, $tremail, $ref, $userId, $trans_id, $key)
    {


        $token = tokenkey();


        $databody = array(

            "amount" => $amount ?? 200,
            "currency" =>  "NGN",
            "merchantRef" => $ref,
            "narration" =>  "Card Payment",
            "callBackUrl" => url('') . "/response",
            "notificationUrl" => url('') . "/api/notify",
            "splitCode" => "",
            "shouldTokenizeCard" => true,

            "customer" => array(
                "customerId" => $userId,
                "customerLastName" => $first_name,
                "customerFirstName" => $last_name,
                "customerEmail" => $tremail ?? "test@email.com",
                "customerPhoneNumber" => "",
                "customerAddress" => "",
                "customerCity" => "",
                "customerStateCode" => "",
                "customerPostalCode" => "",
                "customerCountryCode"  => "NG"
            ),

            "channels" => array(
                0 => "Card"
            ),


            "integrationKey" => env('PELPAYTOKEN'),
            "mcc" => 0,
            "merchantDescriptor" =>  $ref




        );


        $post_data = json_encode($databody);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.pelpay.africa/payment/advice',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $post_data,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                "Authorization: Bearer $token"
            ),
        ));

        $var = curl_exec($curl);
        curl_close($curl);
        $var = json_decode($var);

        $req = $var->requestSuccessful ?? null;

        if ($req == null) {
            return null;
        }


        $data['status'] = $var->responseData->status ?? null;
        $data['adviceReference'] = $var->responseData->adviceReference ?? null;
        $data['paymentUrl'] = $var->responseData->paymentUrl ?? null;


        return $data;
    }
}


if (!function_exists('verify_payment')) {

    function verify_payment($ref)
    {


        $token = tokenkey();
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.pelpay.africa/api/Transaction/bypaymentreference/$ref",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                "Authorization: Bearer $token"
            ),
        ));

        $var = curl_exec($curl);
        curl_close($curl);
        $var = json_decode($var);


        if ($var->requestSuccessful == true) {

            $data['transactionStatus'] = $var->responseData->transactionStatus;
            $data['amount'] = $var->responseData->amountCollected;
            $data['merchantReference'] = $var->responseData->merchantReference;


            return $data;
        } else {

            $message = "Fools trying to do stuffs";
            send_notification($message);
            return null;
        }
    }
}


if (!function_exists('crypto_token')) {

    function crypto_token()
    {


        $databody = array(

            "email" => env('CRYPEMAIL'),
            "password" => env('CRYPPASS'),

        );


        $post_data = json_encode($databody);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.nowpayments.io/v1/auth',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>  $post_data,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $var = curl_exec($curl);
        curl_close($curl);
        $var = json_decode($var);

        return $var->token;
    }
}


if (!function_exists('crypto_currency')) {


    function crypto_currency()
    {

        $key = env("CRYPAPI");
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.nowpayments.io/v1/full-currencies',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                "x-api-key: $key"
            ),
        ));

        $var = curl_exec($curl);
        curl_close($curl);
        $var = json_decode($var);


        return $var->currencies;
    }
}


if (!function_exists('get_min')) {

    function get_min($to_curr)
    {

        $key = env("CRYPAPI");

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.nowpayments.io/v1/min-amount?currency_from=$to_curr&currency_to=usd&fiat_equivalent=usd&is_fee_paid_by_user=False",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                "x-api-key: $key"
            ),
        ));

        $var = curl_exec($curl);
        curl_close($curl);
        $var = json_decode($var);

        return $var->fiat_equivalent;
    }
}

if (!function_exists('get_rate')) {

    function get_rate()
    {

        $key = env('BKEY');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://issuecards.api.bridgecard.co/v1/issuing/cards/fx-rate',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                "token: Bearer $key"
            ),
        ));

        $var = curl_exec($curl);
        curl_close($curl);
        $var = json_decode($var);

        $status = $var->status ?? null;

        if ($status == 'success') {
            return $var->data->{'NGN-USD'} / 100;
        } else {
            return 0;
        }
    }
}



if (!function_exists('estimate')) {

    function estimate($amount, $code)
    {


        $key = env("CRYPAPI");
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.nowpayments.io/v1/estimate?amount=$amount&currency_from=usd&currency_to=$code",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                "x-api-key: $key"
            ),
        ));

        $var = curl_exec($curl);
        curl_close($curl);
        $var = json_decode($var);


        return $var->estimated_amount;
    }
}



if (!function_exists('create_payment')) {
    function create_payment($amount, $code, $order_id, $order_description)
    {

        $key = env("CRYPAPI");
        $databody = array(

            "price_amount" => $amount,
            "price_currency" => "usd",
            "pay_currency" => $code,
            "ipn_callback_url" => url('') . "/crypto-process",
            "order_id" => $order_id,
            "order_description" => "Apple Macbook Pro 2019 x 1"

        );


        $post_data = json_encode($databody);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.nowpayments.io/v1/payment',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $post_data,
            CURLOPT_HTTPHEADER => array(
                "x-api-key: $key",
                'Content-Type: application/json'
            ),
        ));


        $var = curl_exec($curl);
        curl_close($curl);
        $var = json_decode($var);

        $data['payment_id'] = $var->payment_id;
        $data['payment_status'] = $var->payment_status;
        $data['pay_address'] = $var->pay_address;
        $data['price_amount'] = $var->price_amount;
        $data['pay_amount'] = $var->pay_amount;
        $data['pay_currency'] = $var->pay_currency;
        $data['order_id'] = $var->order_id;
        $data['purchase_id'] = $var->purchase_id;
        $data['valid_until'] = $var->valid_until;

        return $data;
    }
}


if (!function_exists('credit_user_wallet')) {
    function credit_user_wallet($url, $user_email, $amount)
    {


        $key = env("CRYPAPI");
        $databody = array(

            "price_amount" => $amount,
            "price_currency" => "usd",


        );


        $post_data = json_encode($databody);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.nowpayments.io/v1/payment',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $post_data,
            CURLOPT_HTTPHEADER => array(
                "x-api-key: $key",
                'Content-Type: application/json'
            ),
        ));


        $var = curl_exec($curl);
        curl_close($curl);
        $var = json_decode($var);

        $data['payment_id'] = $var->payment_id;
        $data['payment_status'] = $var->payment_status;
        $data['pay_address'] = $var->pay_address;
        $data['price_amount'] = $var->price_amount;
        $data['pay_amount'] = $var->pay_amount;
        $data['pay_currency'] = $var->pay_currency;
        $data['order_id'] = $var->order_id;
        $data['purchase_id'] = $var->purchase_id;
        $data['valid_until'] = $var->valid_until;

        return $data;
    }
}

