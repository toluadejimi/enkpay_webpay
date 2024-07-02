<?php

namespace App\Http\Controllers;

use App\Models\CardwebTransaction;
use App\Models\Charge;
use App\Models\CompletedWebtransfer;
use App\Models\ManualAccount;
use App\Models\PendingcardTransaction;
use App\Models\Setting;
use App\Models\Support;
use App\Models\Transaction;
use App\Models\Transfer;
use App\Models\Transfertransaction;
use App\Models\Ttmfb;
use App\Models\User;
use App\Models\VirtualAccount;
use App\Models\Webkey;
use App\Models\Webtransfer;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class TransactionController extends Controller
{


    public function e_payment(Request $request)
    {
        $message = $request->all();
        send_notification($message);
    }

    public function send_money(Request $request)
    {


        $get_key = $request->key;
        if ($get_key == null) {

            return response()->json([
                'status' => false,
                'message' => 'Merchant Key can not be null'
            ], 422);

        }


        $user_id = Webkey::where('key', $get_key)->first()->user_id ?? null;
        $user = User::where('id', $user_id)->first();


        if ($user->main_wallet < $request->amount) {

            return response()->json([
                'status' => false,
                'message' => 'Insufficient Funds',
                'amount' => $user->main_wallet
            ], 422);

        }


        $amoutCharges = $request->amount + 25;
        User::where('id', $user_id)->decrement('main_wallet', $amoutCharges);

        $trans_id = trxref();
        $username = env('MUSERNAME');
        $prkey = env('MPRKEY');
        $sckey = env('MSCKEY');

        $unixTimeStamp = timestamp();
        $sha = sha512($unixTimeStamp . $prkey);
        $authHeader = 'magtipon ' . $username . ':' . base64_encode(hex2bin($sha));


        $ref = sha512($trans_id . $prkey);

        $signature = base64_encode(hex2bin($ref));
        $name = $user->first_name . " " . $user->last_name;


        $databody = array(

            "Amount" => $request->amount,
            "RequestRef" => $trans_id,
            "CustomerDetails" => array(
                "Fullname" => "REFERAL",
                "MobilePhone" => "",
                "Email" => ""
            ),
            "BeneficiaryDetails" => array(
                "Fullname" => "REF",
                "MobilePhone" => "",
                "Email" => ""
            ),
            "BankDetails" => array(
                "BankType" => "comm",
                "BankCode" => $request->bank_code,
                "AccountNumber" => $request->acct_no,
                "AccountType" => "10"
            ),

            "Signature" => $signature,
        );


        $post_data = json_encode($databody);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://magtipon.buildbankng.com/api/v1/transaction/fundstransfer',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $post_data,
            CURLOPT_HTTPHEADER => array(
                "Authorization: $authHeader",
                "Timestamp: $unixTimeStamp",
                'Content-Type: application/json',
            ),
        ));

        $var = curl_exec($curl);
        $result = json_decode($var);
        $status = $result->ResponseCode ?? null;
        $session_id = $result->RemoteRef ?? null;
        $tt_mfb_response = $result->TransactionRef ?? null;
        $api_ref = $result->RemoteRef ?? null;
        curl_close($curl);

        if ($status == 50003) {

            $name = $user->first_name . " " . $user->last_name;
            $message = $name . "| REFERRAL Transferred " . $request->amount . " | " . $request->bank_code . " | " . $request->acct_no . "Duplicate Transaction";
            $result = "Message========> " . $message . "\n\nIP========> ";
            send_notification($result);

            return response()->json([
                'status' => false,
                'message' => "Duplicate Transaction",

            ], 500);
        }

        if ($status == 11011 || $status == 50002) {

            $trasnaction = new Transaction();
            $trasnaction->user_id = $user->id;
            $trasnaction->ref_trans_id = $trans_id;
            $trasnaction->e_ref = $tt_mfb_response;
            $trasnaction->type = "InterBankTransfer";
            $trasnaction->main_type = "Transfer";
            $trasnaction->transaction_type = "BankTransfer";
            $trasnaction->title = "REFERAL";
            $trasnaction->debit = $amoutCharges;
            $trasnaction->amount = $request->amount;
            $trasnaction->note = "PENDING - BANK REFERAL TRANSFER ";
            $trasnaction->p_sessionid = $session_id;
            $trasnaction->status = 0;
            $trasnaction->save();

            //Transfers
            $trasnaction = new Transfer();
            $trasnaction->user_id = $user->id;
            $trasnaction->ref_trans_id = $trans_id;
            $trasnaction->e_ref = $tt_mfb_response;
            $trasnaction->type = "InterBankTransfer";
            $trasnaction->main_type = "Transfer";
            $trasnaction->transaction_type = "BankTransfer";
            $trasnaction->title = "REFERAL";
            $trasnaction->debit = $amoutCharges;
            $trasnaction->amount = $request->amount;
            $trasnaction->note = "PENDING - BANK REFERAL TRANSFER ";
            $trasnaction->p_sessionid = $session_id;
            $trasnaction->status = 0;
            $trasnaction->save();


            return response()->json([
                'status' => false,
                'message' => "Transaction Pending",

            ], 422);
        }


        if ($status == 90000) {
            //update Transactions
            $trasnaction = new Transaction();
            $trasnaction->user_id = $user->id;
            $trasnaction->ref_trans_id = $trans_id;
            $trasnaction->e_ref = $tt_mfb_response;
            $trasnaction->type = "InterBankTransfer";
            $trasnaction->main_type = "Transfer";
            $trasnaction->transaction_type = "BankTransfer";
            $trasnaction->title = "REFERAL";
            $trasnaction->debit = $amoutCharges;
            $trasnaction->amount = $request->amount;
            $trasnaction->note = "REFERRAL - BANK TRANSFER SUCCESSFUL ";
            $trasnaction->p_sessionid = $session_id;
            $trasnaction->status = 1;
            $trasnaction->save();

            //Transfers
            $trasnaction = new Transfer();
            $trasnaction->user_id = $user->id;
            $trasnaction->ref_trans_id = $trans_id;
            $trasnaction->e_ref = $tt_mfb_response;
            $trasnaction->type = "InterBankTransfer";
            $trasnaction->main_type = "Transfer";
            $trasnaction->transaction_type = "BankTransfer";
            $trasnaction->title = "REFERAL";
            $trasnaction->debit = $amoutCharges;
            $trasnaction->amount = $request->amount;
            $trasnaction->note = "REFERRAL - BANK TRANSFER SUCCESSFUL ";
            $trasnaction->p_sessionid = $session_id;
            $trasnaction->status = 1;
            $trasnaction->save();


            $name = $user->first_name . " " . $user->last_name;
            $message = $name . "| REFERRAL Transferred " . $request->amount . " | " . $request->bank_code . " | " . $request->acct_no . "Duplicate Transaction";
            $result = "Message========> " . $message . "\n\nIP========> ";
            send_notification($result);


            return response()->json([
                'status' => true,
                'message' => "Transaction Completed",

            ], 200);
        }


        if ($status == 60001) {

            $full_name = $user->first_name . " " . $user->last_name;
            $message = "Transaction reversed | $status | " . $result->ResponseDescription ?? null;

            User::where('id', $user_id)->increment('main_wallet', $amoutCharges);


            $result = $status . "| Message========> " . $message . "\n\nCustomer Name========> " . $full_name;
            send_notification($result);


            return response()->json([
                'status' => false,
                'message' => "Transaction Reversed",

            ], 500);


        }

        $message = "Transaction reversed | $status";
        $full_name = $user->first_name . " " . $user->last_name;

        $result = $status . "| Message========> " . $message . "\n\nCustomer Name========> " . $full_name;
        send_notification($result);


        return response()->json([
            'status' => false,
            'message' => "Transaction Reversed",

        ], 500);
    }


    public function get_account_details(Request $request)
    {


        try {


            $get_key = $request->header('Authorization');

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

        $key = $request->key;
        $amount = $request->amount;
        $email = $request->email;
        $ref = $request->ref;
        $wc_order = $request->wc_order;
        $client_id = $request->client_id;
        $iref = $ref ?? $wc_order;
        $email = $request->email ?? "example@gmail.com";
        $details = Webkey::where('key', $request->key)->first() ?? null;
        $user_id = $details->user_id;
        $business_id = VirtualAccount::where('user_id', $details->user_id)->first()->business_id ?? null;





        if ($business_id != null) {

            if ($email == null) {
                $webhook = Webkey::where('key', $request->key)->first()->url ?? null;
                return Redirect::to($webhook);
            }

            $acc = VirtualAccount::where('user_id', $details->user_id)->where('state', 0)->first() ?? null;
        }

        $marchant_url = $details->url ?? null;

        if ($amount == null) {
            return view('invalid');
        }

        if ($ref == null) {
            return view('invalid');
        }

        if ($key == null) {
            return view('invalid');
        }

        if ($details->user_id == null) {
            return view('invalidkey');
        }

        $charge_status = $acc->charge_status ?? null;
        $p_account_no = $acc->v_account_no ?? null;
        $p_account_name = $acc->v_account_name ?? null;
        $p_bank_name = $acc->v_bank_name ?? null;




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

        $url = "https://web.enkpay.com/continue-pay?amount=$amount&key=$key&ref=$trans_id&email=$email";
        $qrdata = $details->user_id . " " . $payable_amount . " " . $trans_id;

        $data = Crypt::encryptString($qrdata);

        $set = Setting::where('id', 1)->first();
        if ($set->pay_by_card == 1) {
            $faker = Factory::create();
            $amount = $request->amount;
            $first_name = User::inRandomOrder()->first()->first_name;
            $last_name = User::inRandomOrder()->first()->last_name;
            $tremail = $faker->email;
            $userId = Str::random(4); //$request->user_id;
            $trans_id = $iref;
            $ref = trx();
            $pre = pre_pay($amount, $first_name, $last_name, $tremail, $ref, $userId, $trans_id, $key);
            $adviceReference = $pre['adviceReference'] ?? null;
            $pre_link = $pre['paymentUrl'] ?? null;
        } else {
            $pre_link = "#";
        }


        $opay_acct = ManualAccount::where('status', 1)->where('type', "opay")->first() ?? null;
        $palmpay_acct = ManualAccount::where('status', 1)->where('type', "palmpay")->first() ?? null;
        $kuda_acct = ManualAccount::where('status', 1)->where('type', "kuda")->first() ?? null;


        $opay_acct_no = $opay_acct->account_no;
        $opay_acct_name = $opay_acct->account_name;


        $get_trans_id = Webtransfer::where('trans_id', $iref)->first() ?? null;
        $transref = $get_trans_id->manual_acc_ref ?? null;

        if ($get_trans_id == null) {
            $transref = date('ymdhis').Str::upper(random_int(00, 99) . Str::random(2));
            $trans = new Webtransfer();
            $trans->amount = $amount;
            $trans->user_id = $details->user_id;
            $trans->v_account_no = $p_account_no;
            $trans->v_account_name = $p_account_name;
            $trans->manual_acc_no_opay = $opay_acct->account_no;
            $trans->manual_acc_name_opay = $opay_acct->account_name;
            $trans->manual_acc_no_palmpay = $palmpay_acct->account_no;
            $trans->manual_acc_name_palmpay = $palmpay_acct->account_name;
            $trans->manual_acc_no_kuda = $kuda_acct->account_no;
            $trans->manual_acc_name_kuda = $kuda_acct->account_name;
            $trans->manual_acc_ref = $transref;
            $trans->bank_name = $p_bank_name;
            $trans->web_charges = $commmission;
            $trans->trans_id = $trans_id;
            $trans->payable_amount = $payable_amount;
            $trans->total_received = $total_received;
            $trans->wc_order = $wc_order;
            $trans->client_id = $client_id;
            $trans->email = $email;
            $trans->url = $url;
            $trans->webhook = $details->webhook;
            $trans->key = $key;
            $trans->data = $data;
            $trans->adviceReference = $adviceReference ?? null;
            $trans->ref = $ref ?? null;
            $trans->both_commmission = $both_commmission;
            $trans->save();
        }


        $set = Setting::where('id', 1)->first();
        $card = $set->pay_by_card;
        $opay_transfer = $set->opay_trx;
        $palmpay_transfer = $set->palmpay_trx;
        $kuda_transfer = $set->kuda_trx;
        $transfer = $set->pay_by_trx;
        $bank = $set->pay_with_providus;
        $crypto = $set->pay_by_crypto;

        $support_channel = Webkey::where('key', $request->key)->first()->support ?? null;

        $support_number = Webkey::where('key', $request->key)->first()->support_number ?? null;

        if($support_number == null){
            $support = Support::where('id', 1)->first()->number ?? null;
        }else{
            $support = $support_number;
        }


        return view('webpay', compact('support','support_number','opay_transfer','support_channel', 'kuda_transfer', 'palmpay_transfer', 'transref', 'opay_acct', 'kuda_acct', 'palmpay_acct', 'opay_acct', 'ref', 'iref', 'crypto', 'card', 'transfer', 'bank', 'pre_link', 'payable_amount', 'email', 'user_id', 'data', 'webhook', 'key', 'amount', 'p_account_no', 'trans_id', 'both_commmission', 'p_account_name', 'p_bank_name', 'total_received'));
    }


    public function card_webhook(Request $request)
    {

        if ($request->paymentReference == null) {

            $trx = Webtransfer::where('adviceReference', $request->adviceReference)->first();
            $marchant_url = Webkey::where('key', $trx->key)->first()->url ?? null;
            Transaction::where('ref_trans_id', $trx->ref)->delete();
            Webtransfer::where('trans_id', $trx->trans_id)->delete();
            $webhook = $marchant_url . "?amount=$trx->payable_amount&trans_id=$trx->trans_id&status=failed";
            return Redirect::to($webhook);
        }


        $ref = $request->paymentReference;
        $payment = verify_payment($ref);
        if ($payment != null) {

            if ($payment['transactionStatus'] == 'Failed') {
                $trx = Webtransfer::where('adviceReference', $request->adviceReference)->first();
                Transaction::where('ref_trans_id', $trx->ref)->delete();
                $marchant_url = Webkey::where('key', $trx->key)->first()->url ?? null;
                Webtransfer::where('trans_id', $trx->trans_id)->delete();
                $webhook = $marchant_url . "?amount=$trx->payable_amount&trans_id=$trx->trans_id&status=failed";
                return Redirect::to($webhook);
            }


            $trx = Webtransfer::where('adviceReference', $request->adviceReference)->first() ?? null;
            if ($trx == null) {
                $message = "Fools | Transaction not found on enkpay";
                send_notification($message);
                return view('notfound');
            }

            if ($trx->status == 1) {
                $message = "Fools | Transaction already confrimed";
                send_notification($message);

                return view('confrimed');
            }


            Webtransfer::where('adviceReference', $request->adviceReference)->where('status', 0)->update(['status' => 1]);

            $trans_id = $trx->trans_id;
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


            $refs = Webtransfer::where('trans_id', $trans_id)
                ->first()->ref ?? null;

            $marchant_url = Webkey::where('key', $key)->first()->url ?? null;

            $webhook = $marchant_url . "?" . "amount=$amount" . "&trans_id=$trans_id" . "&status=success" . "&wc_order=$wc_order" . "&client_id=$client_id" ?? null;


            $recepit = "https://web.enkpay.com/receipt?trans_id=$trans_id&amount=$amount";


            $message = "Card Payment  Successful |" . $payment['merchantReference'];
            send_notification($message);


            return view('success', compact('webhook', 'marchant_url', 'amount', 'trans_id', 'wc_order', 'client_id', 'wc', 'recepit'));
        } else {

            return view('error');
        }
    }


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
            ->first()->key ?? null;


        $status = Webtransfer::where('trans_id', $trans_id)
            ->first()->status ?? null;


        $amount = Webtransfer::where('trans_id', $trans_id)
            ->first()->amount ?? null;


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



        if ($status == 4) {
            return response()->json([
                'status' => 'paid'
            ], 200);

            //return view('success', compact('webhook'));
        }



    }

    public function opay_check_status(Request $request)
    {

        $trans_id = $request->trans_id;
        $account_no = $request->account_no;


        $user_id = Webtransfer::where('manual_acc_ref', $trans_id)
            ->first()->user_id ?? null;

        $key = Webkey::where('user_id', $user_id)
            ->first()->key ?? null;


        $status = Webtransfer::where('manual_acc_ref', $trans_id)
            ->where('manual_acc_no_opay', $account_no)
            ->first()->status ?? null;


        $amount = Webtransfer::where('manual_acc_ref', $trans_id)
            ->first()->amount ?? null;


        $amount_received = Webtransfer::where('manual_acc_ref', $trans_id)
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

    public function palmpay_check_status(Request $request)
    {


        $trans_id = $request->trans_id;
        $account_no = $request->account_no;


        $user_id = Webtransfer::where('manual_acc_ref', $trans_id)
            ->first()->user_id ?? null;

        $key = Webkey::where('user_id', $user_id)
            ->first()->key ?? null;


        $status = Webtransfer::where('manual_acc_ref', $trans_id)
            ->where('manual_acc_no_palmpay', $account_no)
            ->first()->status ?? null;


        $amount = Webtransfer::where('manual_acc_ref', $trans_id)
            ->first()->amount ?? null;


        $amount_received = Webtransfer::where('manual_acc_ref', $trans_id)
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


    public function kuda_check_status(Request $request)
    {


        $trans_id = $request->trans_id;
        $account_no = $request->account_no;


        $user_id = Webtransfer::where('manual_acc_ref', $trans_id)
            ->first()->user_id ?? null;

        $key = Webkey::where('user_id', $user_id)
            ->first()->key ?? null;


        $status = Webtransfer::where('manual_acc_ref', $trans_id)
            ->where('manual_acc_no_kuda', $account_no)
            ->first()->status ?? null;


        $amount = Webtransfer::where('manual_acc_ref', $trans_id)
            ->first()->amount ?? null;


        $amount_received = Webtransfer::where('manual_acc_ref', $trans_id)
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

        $webhook = $marchant_url . "?" . "amount=$amount" . "&trans_id=$trans_id" . "&status=success" . "&wc_order=$wc_order" . "&client_id=$client_id" ?? null;


        $recepit = "https://web.enkpay.com/receipt?trans_id=$trans_id&amount=$amount";

        //

        return view('success', compact('webhook', 'marchant_url', 'amount', 'trans_id', 'wc_order', 'client_id', 'wc', 'recepit'));
    }




    public function paid_success(Request $request)
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
        $url_page = Webkey::where('key', $key)->first()->user_url ?? null;

        $webhook = $marchant_url . "?" . "amount=$amount" . "&trans_id=$trans_id" . "&status=success" . "&wc_order=$wc_order" . "&client_id=$client_id" ?? null;
        $recepit = "https://web.enkpay.com/receipt?trans_id=$trans_id&amount=$amount";

        //

        return view('paid-success', compact('webhook','url_page', 'marchant_url', 'amount', 'trans_id', 'wc_order', 'client_id', 'wc', 'recepit'));
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

            if ($set->bank == 'ttmfb') {
                $data = Ttmfb::select('bankName', 'code')->get();
                return response()->json(['data' => $data]);
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
                    Transaction::where('ref_trans_id', $ref)->update(['resolve' => 1]);
                    Transfertransaction::where('ref_trans_id', $ref)->update(['resolve' => 1]);

                    return response()->json([
                        'status' => true,
                        'detail' => 'success',
                        'price' => $trx->amount,
                    ], 200);
                }

                if ($trx->status == 0) {
                    return response()->json([
                        'status' => true,
                        'detail' => 'pending',
                        'price' => $trx->amount,
                    ], 200);
                }
            } else {


                $trx = CompletedWebtransfer::where('trans_id', $ref)->first() ?? null;
                if ($trx != null) {

                    if ($trx->status == 1) {
                        Transaction::where('ref_trans_id', $ref)->update(['resolve' => 1]);
                        return response()->json([
                            'status' => true,
                            'detail' => 'success',
                            'price' => $trx->amount,
                        ], 200);
                    }
                } else {

                    return response()->json([
                        'status' => false,
                        'detail' => 'failed',
                        'message' => 'Transaction not found'
                    ], 500);
                }
            }
        } else {

            return response()->json([
                'status' => false,
                'detail' => 'Ref ID can not be null'
            ], 500);
        }
    }


    public function verify_others(request $request)
    {

        $ref = $request->trans_id;

        if ($ref != null) {

            $trx = Transfertransaction::where('trans_id', $ref)->first() ?? null;

            if ($trx != null) {

                if ($trx->status == 1) {
                    Transaction::where('ref_trans_id', $ref)->update(['resolve' => 1]);
                    return response()->json([
                        'status' => true,
                        'detail' => 'success',
                        'price' => $trx->amount,
                    ], 200);
                }

                if ($trx->status == 0) {
                    return response()->json([
                        'status' => true,
                        'detail' => 'pending',
                        'price' => $trx->amount,
                    ], 200);
                }
            } else {

                return response()->json([
                    'status' => false,
                    'detail' => 'failed',
                    'message' => 'Transaction not found'
                ], 500);

            }
        }

            return response()->json([
                'status' => false,
                'detail' => 'failed',
                'message' => 'Transaction not found'
            ], 500);


    }


    public function initialize_payment(Request $request)
    {


        // try {

        $key = $request->key;
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

        $key = $request->key;
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


        return view('webpay', compact('payable_amount', 'email', 'user_id', 'data', 'webhook', 'key', 'amount', 'v_account_no', 'p_account_no', 'trans_id', 'both_commmission', 'v_account_name', 'p_account_name', 'bank_name', 'p_bank_name', 'total_received'));
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
        $ref = $request->ref;

        if ($session_id == null) {

            return response()->json([
                'status' => false,
                'message' => 'session id  cant be empty',
            ], 500);
        }


        $get_depo = Transaction::where('p_sessionId', $session_id)->first()->resolve ?? null;
        $get_amount = Transaction::where('p_sessionId', $session_id)->first()->amount ?? null;
        $trx = Transaction::where('p_sessionId', $session_id)->first()->ref_trans_id ?? null;


        if ($get_depo == null) {

            return response()->json([
                'status' => false,
                'message' => "Transaction not found",
            ], 500);
        }


        if ($get_depo == 0) {

            Transaction::where('p_sessionId', $session_id)->update(['resolve' => 1]);
            $acct = Transaction::where('p_sessionId', $session_id)->first()->receiver_account_no ?? null;
            VirtualAccount::where('v_account_no', $acct)->update(['state' => 0]);

            if ($ref != null) {
                Transaction::where('p_sessionId', $session_id)->where('ref_trans_id', null)->update(['ref_trans_id' => $ref]);
            }


            return response()->json([
                'status' => true,
                'amount' => $get_amount,
                'trx' => $trx,

            ], 200);
        }

        if ($get_depo == 1) {

            return response()->json([
                'status' => false,
                'message' => "Transaction has been Resolved, NGN $get_amount has been added to your wallet",
            ], 500);
        }
    }


    public function resolve_others(Request $request)
    {

        $session_id = $request->session_id;
        $ref = $request->ref;

        $trx = Transfertransaction::where('ref_trans_id', $request->ref)->first() ?? null;
        $amount = $trx->amount;


        if ($trx == null) {

            return response()->json([
                'status' => false,
                'message' => "Transaction not found",
            ], 500);
        }


        if ($trx->status == 1 && $trx->reslove == 0) {



            Transfertransaction::where('ref_trans_id', $request->ref)->update(['resolve' => 1]);
            return response()->json([
                'status' => true,
                'amount' => $amount,
                'trx' => $trx,

            ], 200);
        }


        if ($trx->resolve == 1) {

            return response()->json([
                'status' => false,
                'message' => "Transaction has been Resolved, NGN $amount has been added to your wallet",
            ], 500);
        }


        return response()->json([
            'status' => false,
            'message' => "Transaction can not be resolved",
        ], 500);


    }


    public function resolve_complete(Request $request)
    {

        $order_id = $request->order_id;

        if ($order_id == null) {

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


    public function notify_webhook(request $request)
    {
        $message = "Card Webhook | " . json_encode($request->all());
        send_notification($message);

        $PaymentReference = $request->PaymentReference;
        $AmountCollected = $request->AmountCollected;
        $TransactionStatus = $request->TransactionStatus;
        $MerchantReference = $request->MerchantReference;


        if ($TransactionStatus != 'Successful') {

            $message = "Card Transaction Failed";
            send_notification($message);
        }


        //Business Information
        $card_commission = Charge::where('title', 'card_pay')->first()->amount;
        //Both Commission
        $amount1 = $card_commission / 100;
        $amount2 = $amount1 * $AmountCollected;
        $commmission_to_remove = round($amount2, 3);

        $enkPay_commision_amount = $AmountCollected - (int)$commmission_to_remove;
        $enkpay_commision = $enkPay_commision_amount;
        $amt_to_credit = $enkpay_commision;
        $amt1 = $amt_to_credit - 4;


        $trx = CardwebTransaction::where('ref_trans_id', $MerchantReference)->where('status', 0)->first() ?? null;
        $status = CardwebTransaction::where('ref_trans_id', $MerchantReference)->where('status', 0)->first()->status ?? null;

        if ($status == null) {

            $trasnaction = new PendingcardTransaction();
            $trasnaction->user_id = null;
            $trasnaction->ref_trans_id = $MerchantReference;
            $trasnaction->e_ref = $PaymentReference;
            $trasnaction->credit = $AmountCollected;
            $trasnaction->fee = 0;
            $trasnaction->balance = 0;
            $trasnaction->type = "webpay-pendig";
            $trasnaction->amount = $AmountCollected;
            $trasnaction->transaction_type = "CARD PENDING";
            $trasnaction->title = "Card Funding pending";
            $trasnaction->main_type = "cardweb";
            $trasnaction->note = "Card Payment | Web Pay";
            $trasnaction->e_charges = 0;
            $trasnaction->enkPay_Cashout_profit = 0;
            $trasnaction->status = 1;
            $trasnaction->save();


            $message = "Card Transaction saved on pending";
            send_notification($message);

        }

        if ($trx == null) {

            $cw = CompletedWebtransfer::where('ref', $MerchantReference)->first() ?? null;
            if ($cw != null) {
                $cws = new CardwebTransaction();
                $cws->user_id = $cw->user_id;
                $cws->ref_trans_id = $cw->ref;
                $cws->transaction_type = "CARD";
                $cws->title = "Card Funding";
                $cws->type = "webpay";
                $cws->main_type = "cardweb";
                $cws->amount = $cw->amount;
                $cws->note = "Card Payment | Web Pay";
                $cws->status = 0;
                $cws->save();

                $message = "Card Transaction saved for approval";
                send_notification($message);


            }

            // if ($cw->status == 1) {
            //     $message = "Card Transaction Already Confirmed";
            //     send_notification($message);
            //     return "success";
            // }
        }


        if ($trx->status == 1) {
            $message = "Card Transaction Already Confirmed";
            send_notification($message);
        }


        User::where('id', $trx->user_id)->increment('main_wallet', $amt1);
        User::where('id', 95)->increment('bonus_wallet', 2);
        User::where('id', 109)->increment('bonus_wallet', 2);


        $balance = User::where('id', $trx->user_id)->first()->main_wallet;
        $first_name = User::where('id', $trx->user_id)->first()->first_name ?? null;
        $last_name = User::where('id', $trx->user_id)->first()->last_name ?? null;


        $trasnaction = new Transaction();
        $trasnaction->user_id = $trx->user_id;
        $trasnaction->ref_trans_id = $MerchantReference;
        $trasnaction->e_ref = $PaymentReference;
        $trasnaction->credit = (int)$amt_to_credit;
        $trasnaction->fee = $commmission_to_remove;
        $trasnaction->balance = $balance;
        $trasnaction->type = "webpay";
        $trasnaction->amount = $trx->amount;
        $trasnaction->transaction_type = "CARD";
        $trasnaction->title = "Card Funding";
        $trasnaction->main_type = "cardweb";
        $trasnaction->note = "Card Payment | Web Pay";
        $trasnaction->e_charges = 0;
        $trasnaction->enkPay_Cashout_profit = $commmission_to_remove;
        $trasnaction->status = 1;
        $trasnaction->save();


        $trx = CardwebTransaction::where('ref_trans_id', $MerchantReference)->update(['status' => 1]);


        //update Transactions
        $message = "Card Payment Completed |" . $MerchantReference . " Business funded | " . number_format($amt1, 2) . "| $first_name " . " " . $last_name;
        send_notification($message);


        // return response()->json([
        //     'message' => 'Transaction Successful',
        // ], 200);
    }


    public function change_state(request $request)
    {
        $state = VirtualAccount::where('v_account_no', $request->account_no)->update(['state' => 1]);
        return $state;
    }


    public function card_transaction(request $request)
    {

        $ref = Webtransfer::where('ref', $request->ref)->first() ?? null;
        $usr = User::where('id', $ref->user_id)->first();

        $trasnaction = new CardwebTransaction();
        $trasnaction->user_id = $ref->user_id;
        $trasnaction->ref_trans_id = $ref->ref;
        $trasnaction->type = "webpay";
        $trasnaction->amount = $ref->amount;
        $trasnaction->transaction_type = "CARD";
        $trasnaction->title = "Card Funding";
        $trasnaction->main_type = "cardweb";
        $trasnaction->note = "Card Payment | Web Pay";
        $trasnaction->e_charges = 0;
        $trasnaction->enkPay_Cashout_profit = 0;
        $trasnaction->status = 0;
        $trasnaction->save();

        $message = "Card Payment Initiated |" . $request->ref . " For  $usr->first_name " . " " . $usr->last_name . " | " . number_format($ref->payable_amount, 2);
        send_notification($message);
    }


    public function opay_transfer_transaction(Request $request)
    {
        $ref = Webtransfer::where('manual_acc_ref', $request->ref)->first() ?? null;
        $usr = User::where('id', $ref->user_id)->first();

        if ($ref->trans_id == $request->ref) {
            return back()->with('error', "duplicate");
        }

        $trasnaction = new Transfertransaction();
        $trasnaction->user_id = $ref->user_id;
        $trasnaction->type = "manualtransferpay";
        $trasnaction->amount = $ref->amount;
        $trasnaction->transaction_type = "WEBTRANSFER";
        $trasnaction->ref_trans_id = $ref->trans_id;
        $trasnaction->bank = "OPAY";
        $trasnaction->ref = $request->ref;
        $trasnaction->account_no = $ref->manual_acc_no_opay;
        $trasnaction->title = "WEBTRANSFER";
        $trasnaction->main_type = "WEBTRF";
        $trasnaction->note = "WEBTRANSFER";
        $trasnaction->e_charges = 0;
        $trasnaction->enkPay_Cashout_profit = 0;
        $trasnaction->status = 0;
        $trasnaction->save();

        $message = "Transfer Payment Initiated |" . $request->ref . "| ON OPAY " . "For " . $usr->last_name . " | " . number_format($ref->payable_amount, 2);
        send_notification($message);
        send_notification_opay($message);
        send_notification2($message);
        send_notification3($message);



    }

    public function palmpay_transfer_transaction(Request $request)
    {
        $ref = Webtransfer::where('manual_acc_ref', $request->ref)->first() ?? null;
        $usr = User::where('id', $ref->user_id)->first();

        if ($ref->trans_id == $request->ref) {
            return back()->with('error', "duplicate");
        }


        $trasnaction = new Transfertransaction();
        $trasnaction->user_id = $ref->user_id;
        $trasnaction->type = "manualtransferpay";
        $trasnaction->amount = $ref->amount;
        $trasnaction->ref_trans_id = $ref->trans_id;
        $trasnaction->transaction_type = "WEBTRANSFER";
        $trasnaction->bank = "PALMPAY";
        $trasnaction->ref = $request->ref;
        $trasnaction->account_no = $ref->manual_acc_no_opay;
        $trasnaction->title = "WEBTRANSFER";
        $trasnaction->main_type = "WEBTRF";
        $trasnaction->note = "WEBTRANSFER";
        $trasnaction->e_charges = 0;
        $trasnaction->enkPay_Cashout_profit = 0;
        $trasnaction->status = 0;
        $trasnaction->save();


        $message = "Transfer Payment Initiated |" . $request->ref . "| ON PALMPAY " . "For " . $usr->last_name . " | " . number_format($ref->payable_amount, 2);
        send_notification($message);
        send_notification_palmpay($message);
        send_notification2($message);
        send_notification3($message);




    }

    public function kuda_transfer_transaction(Request $request)
    {
        $ref = Webtransfer::where('manual_acc_ref', $request->ref)->first() ?? null;
        $usr = User::where('id', $ref->user_id)->first();

        if ($ref == null) {
            $trasnaction = new Transfertransaction();
            $trasnaction->user_id = $ref->user_id;
            $trasnaction->type = "manualtransferpay";
            $trasnaction->ref_trans_id = $ref->trans_id;
            $trasnaction->amount = $ref->amount;
            $trasnaction->transaction_type = "WEBTRANSFER";
            $trasnaction->bank = "KUDA";
            $trasnaction->ref = $request->ref;
            $trasnaction->account_no = $ref->manual_acc_no_opay;
            $trasnaction->title = "WEBTRANSFER";
            $trasnaction->main_type = "WEBTRF";
            $trasnaction->note = "WEBTRANSFER";
            $trasnaction->e_charges = 0;
            $trasnaction->enkPay_Cashout_profit = 0;
            $trasnaction->status = 0;
            $trasnaction->save();


            $message = "Transfer Payment Initiated |" . $request->ref . "| ON KUDA " . "For " . $usr->last_name . " | " . number_format($ref->payable_amount, 2);
            send_notification($message);
        }

    }


}
