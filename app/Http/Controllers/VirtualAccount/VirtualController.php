<?php

namespace App\Http\Controllers\VirtualAccount;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Webkey;
use Illuminate\Http\Request;

class VirtualController extends Controller
{
    public function create_dynamic_account(request $request)
    {

        $key = $request->header('key');
        $business_id = $request->business_id;
        $name = $request->name;



        if ($key == null) {
            return response()->json([
                'status' => false,
                'message' => "Business key can is required",

            ]);
        }


        if ($business_id == null) {
            return response()->json([
                'status' => false,
                'message' => "Business ID is required",

            ]);
        }

        if ($business_id == null) {
            return response()->json([
                'status' => false,
                'message' => "Customer Name is required",

            ]);
        }


        $usr = User::where('business_id', $business_id)->first();
        $get_key = Webkey::where('user_id', $usr->id)->first()->key;
        if ($get_key == $key) {
            $data = create_dynamic_p_account($name, $business_id);

            return response()->json([
                'status' => true,
                'data' => $data[0],
            ]);
        }


        return response()->json([
            'status' => false,
            'message' => "Business key is not valid",

        ]);
    }









}





namespace App\Http\Controllers\Virtual;

use App\Http\Controllers\Controller;
use App\Models\Charge;
use App\Models\Terminal;
use App\Models\Transaction;
use App\Models\User;
use App\Models\VirtualAccount;
use App\Models\Webtransfer;
use Auth;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;

class VirtualaccountController extends Controller
{

    public $success = true;
    public $failed = false;

    public function create_account(request $request)
    {



    }

    public function get_created_account()
    {

        try {

            $errand_key = errand_api_key();

            $b_code = env('BCODE');

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.errandpay.com/epagentservice/api/v1/GetSubAccounts?businessCode=$b_code",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(

                    "Authorization: Bearer $errand_key",

                ),
            ));

            $var = curl_exec($curl);

            curl_close($curl);
            $var = json_decode($var);

            if ($var->code == 200) {

                return response()->json([

                    'status' => $this->success,
                    'data' => $var->data,

                ], 200);

            }

            return response()->json([

                'status' => $this->failed,
                'data' => $var->error->message,

            ], 500);

        } catch (\Exception $th) {
            return $th->getMessage();
        }

    }

    public function cash_in_webhook(Request $request)
    {

        try {

            $header = $request->header('errand-pay-header');

            $StatusCode = $request->StatusCode;
            $StatusDescription = $request->StatusDescription;
            $VirtualCustomerAccount = $request->VirtualCustomerAccount;
            $Amount = $request->Amount;
            $Currency = $request->Currency;
            $TransactionDate = $request->TransactionDate;
            $TransactionTime = $request->TransactionTime;
            $TransactionType = $request->TransactionType;
            $ServiceCode = $request->ServiceCode;
            $Fee = $request->Fee;
            $PostingType = $request->PostingType;
            $TransactionReference = $request->TransactionReference;
            $sender_account_no = $request->OriginatorAccountNumber;
            $sender_name = $request->OriginatorAccountName;
            $sender_bank = $request->OriginatorBank;

            $key = env('ERIP');

            $deposit_charges = Charge::where('id', 2)->first()->amount;

            $trans_id = "ENK-" . random_int(100000, 999999);
            $verify1 = hash('sha512', $key);

            if ($verify1 == $header) {

                if ($StatusCode == 00) {

                    $deposit_charges = Charge::where('id', 2)->first()->amount;

                    $user_id = VirtualAccount::where('v_account_no', $VirtualCustomerAccount)
                        ->first()->user_id ?? null;

                    $main_wallet = User::where('id', $user_id)
                        ->first()->main_wallet ?? null;

                    $user_id = User::where('id', $user_id)
                        ->first()->id ?? null;

                    $user_email = User::where('id', $user_id)
                        ->first()->email ?? null;


                    $device_id = User::where('id', $user_id)
                    ->first()->device_id ?? null;


                    $first_name = User::where('id', $user_id)
                        ->first()->first_name ?? null;

                    $last_name = User::where('id', $user_id)
                        ->first()->last_name ?? null;

                    $check_status = User::where('id', $user_id)->first()->status ?? null;

                    $serial_no = Terminal::where('v_account_no', $VirtualCustomerAccount)
                        ->first()->serial_no ?? null;

                    if ($main_wallet == null && $user_id == null) {

                        return response()->json([
                            'status' => false,
                            'message' => 'V Account not registred on Enkpay',
                        ], 500);

                    }

                    if ($check_status == 3) {

                        return response()->json([
                            'status' => $this->failed,
                            'message' => 'Account has been Restricted on ENKPAY',
                        ], 500);

                    }

                    $enkpay_profit = $deposit_charges - 10;

                    $message_amount = $Amount - 10;

                    //credit
                    $enkpay_debit = $Amount - $deposit_charges;
                    $updated_amount = $main_wallet + $enkpay_debit;
                    $main_wallet = User::where('id', $user_id)
                        ->update([
                            'main_wallet' => $updated_amount,
                        ]);

                    if ($TransactionType == 'FundWallet') {

                        //update Transactions
                        $trasnaction = new Transaction();
                        $trasnaction->user_id = $user_id;
                        $trasnaction->ref_trans_id = $trans_id;
                        $trasnaction->e_ref = $TransactionReference;
                        $trasnaction->type = $TransactionType;
                        $trasnaction->transaction_type = "VirtualFundWallet";
                        $trasnaction->title = "Wallet Funding";
                        $trasnaction->main_type = "Transfer";
                        $trasnaction->credit = $enkpay_debit;
                        $trasnaction->note = "$sender_name | Wallet Funding";
                        $trasnaction->fee = $Fee;
                        $trasnaction->amount = $Amount;
                        $trasnaction->e_charges = $deposit_charges;
                        $trasnaction->enkPay_Cashout_profit = $enkpay_profit;
                        $trasnaction->trx_date = $TransactionDate;
                        $trasnaction->trx_time = $TransactionTime;
                        $trasnaction->sender_name = $sender_name;
                        $trasnaction->sender_bank = $sender_bank;
                        $trasnaction->serial_no = $serial_no;
                        $trasnaction->sender_account_no = $sender_account_no;
                        $trasnaction->balance = $updated_amount;
                        $trasnaction->status = 1;
                        $trasnaction->save();

                        $errand_key = errand_api_key();

                        $b_code = env('BCODE');

                        $acct_no = $request->acct_no;

                        $curl = curl_init();

                        $datetime = new \DateTime ("now", new DateTimeZone("Europe/Bucharest"));

                        $date1 = $datetime->format('Y-m-d');
                        $date2 = $datetime->format('H:i:s');

                        $data = array(

                            "Amount" => $Amount,
                            "DateOfTransaction" => $date1 . "T" . $date2 . "+" . "01:00",
                            "SenderAccountNumber" => $sender_account_no,
                            "SenderAccountName" => $sender_name,
                            "OriginatorBank" => $sender_bank,
                            "RecipientAccountNumber" => $VirtualCustomerAccount,
                            "RecipientAccountName" => $first_name . " " . $last_name,

                        );

                        $post_data = json_encode($data);

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://api.errandpay.com/epagentservice/api/v1/Webhook/Notify',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => $post_data,
                            CURLOPT_HTTPHEADER => array(
                                'epKey: ep_live_jFrIZdxqSzAdraLqbvhUfVYs',
                                'Content-Type: application/json',
                            ),
                        ));

                        $var = curl_exec($curl);
                        curl_close($curl);
                        $var = json_decode($var);


                        if($device_id != null ){

                            $data = [

                                "registration_ids" => array($device_id),

                                    "notification" => [
                                        "title" => "Incoming Transfer",
                                        "body" => "You have an Incoming transfer from $sender_name",
                                        "icon" => "ic_notification",
                                        "click_action" => "OPEN_CHAT_ACTIVITY",

                                    ],

                                    "data" =>[
                                        "sender_name" => "$sender_name",
                                        "sender_bank" => "$sender_bank",
                                        "amount" => "$Amount"
                                    ],

                                ];

                            $dataString = json_encode($data);

                            $SERVER_API_KEY = env('FCM_SERVER_KEY');

                            $headers = [
                                'Authorization: key=' . $SERVER_API_KEY,
                                'Content-Type: application/json',
                            ];


                            $ch = curl_init();

                            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                            curl_setopt($ch, CURLOPT_POST, true);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

                            $get_response = curl_exec($ch);


                            //dd($get_response, $dataString, $headers);
                            curl_close($curl);




                        }

                    }


                    $message = "Your Pool account has been credited |  $message_amount | from VFD Virtual account";
                    send_notification($message);


                    $get_web_transfer = Webtransfer::where('v_account_no', $VirtualCustomerAccount)
                    ->where('payable_amount', $Amount)->first()->status ?? null;

                    if($get_web_transfer == 0){

                        Webtransfer::where('v_account_no', $VirtualCustomerAccount)
                        ->where('payable_amount', $Amount)
                        ->update(['status' => 1]);


                    }

                    //send to user

                    if ($user_email !== null) {

                        $data = array(
                            'fromsender' => 'noreply@enkpayapp.enkwave.com', 'EnkPay',
                            'subject' => "Virtual Account Credited",
                            'toreceiver' => $user_email,
                            'amount' => $enkpay_debit,
                            'first_name' => $first_name,
                        );

                        Mail::send('emails.transaction.virtual-credit', ["data1" => $data], function ($message) use ($data) {
                            $message->from($data['fromsender']);
                            $message->to($data['toreceiver']);
                            $message->subject($data['subject']);
                        });
                    }

                    return response()->json([
                        'status' => true,
                        'message' => 'Tranasaction Successsfull',
                    ], 200);

                }

            }

            return response()->json([
                'status' => false,
                'message' => 'Key not Authorized',
            ], 500);

        } catch (\Exception $th) {
            return $th->getMessage();
        }

    }

    public function get_virtual_account(request $request)
    {

        try {

            $bank = "VFD MICROFINANCE BANK";

            $get_account = User::select('v_account_no', 'v_account_name')->where('id', Auth::id())
                ->first() ?? null;

            $account = $get_account;
            $account['bank'] = $bank;

            if ($account !== null) {
                return response()->json([

                    'status' => $this->success,
                    'data' => $account,

                ], 200);
            }

            return response()->json([

                'status' => $this->failed,
                'data' => "Contact support to create your bank account",

            ], 500);

        } catch (\Exception $th) {
            return $th->getMessage();
        }

    }

    public function virtual_acct_history(Request $request)
    {

        try {

            $errand_key = errand_api_key();

            $b_code = env('BCODE');

            $acct_no = $request->acct_no;

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.errandpay.com/epagentservice/api/v1/GetSubAccountHistory?businessCode=$b_code&accountNumber=$acct_no&pageNumber=1&pageSize=50",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer $errand_key",
                ),
            ));

            $var = curl_exec($curl);

            curl_close($curl);
            $var = json_decode($var);

            dd($var, $errand_key, $acct_no);

        } catch (\Exception $th) {
            return $th->getMessage();
        }

    }

    //PROVIDUS VIRTUAL ACCOUNT

    public function providusCashIn(request $request)
    {

        try {

            $header = $request->header('X-Auth-Signature');

            $sessionId = $request->sessionId;
            $accountNumber = $request->accountNumber;
            $tranRemarks = $request->tranRemarks;
            $settledAmount = $request->settledAmount;
            $transactionAmount = $request->transactionAmount;
            $feeAmount = $request->feeAmount;
            $TransactionTime = $request->TransactionTime;
            $initiationTranRef = $request->initiationTranRef;
            $settlementId = $request->settlementId;
            $sourceAccountNumber = $request->sourceAccountNumber;
            $PostingType = $request->PostingType;
            $TransactionReference = $request->TransactionReference;
            $sourceAccountName = $request->sourceAccountName;
            $sourceBankName = $request->sourceBankName;
            $channelId = $request->channelId;
            $tranDateTime = $request->tranDateTime;

            $key = env('POKEY');

            $deposit_charges = Charge::where('id', 2)->first()->amount;

            $trans_id = "ENK-" . random_int(100000, 999999);

            $verify1 = hash('sha512', $key);

            $verify2 = strtoupper($verify1);

            //dd($key, $verify2, $verify1, $header);

            if ($verify2 == $header) {

                $deposit_charges = Charge::where('id', 2)->first()->amount;

                $user_id = VirtualAccount::where('v_account_no', $accountNumber)
                    ->first()->user_id ?? null;

                $main_wallet = User::where('id', $user_id)
                    ->first()->main_wallet ?? null;

                $user_id = User::where('id', $user_id)
                    ->first()->id ?? null;

                $user_email = User::where('id', $user_id)
                    ->first()->email ?? null;

                $first_name = User::where('id', $user_id)
                    ->first()->first_name ?? null;

                $last_name = User::where('id', $user_id)
                    ->first()->last_name ?? null;

                $SerialNumber = Terminal::where('user_id', $user_id)
                    ->first()->serial_no ?? null;

                $check_status = User::where('id', $user_id)->first()->status ?? null;

                $VirtualCustomerAccount = User::where('v_account_no', $accountNumber)->first()->v_account_no ?? null;

                $get_session = Transaction::where('e_ref', $settlementId)->first()->e_ref ?? null;

                if ($main_wallet == null && $user_id == null) {

                    return response()->json([
                        'requestSuccessful' => true,
                        'sessionId' => $sessionId,
                        'responseMessage' => 'V Account no registerd on ENKPAY',
                        'responseCode' => "02",
                    ], 200);

                }

                if ($get_session == $settlementId) {

                    return response()->json([
                        'requestSuccessful' => true,
                        'sessionId' => $sessionId,
                        'responseMessage' => 'duplicate transaction',
                        'responseCode' => "01",
                    ], 200);

                }

                if ($check_status == 3) {

                    return response()->json([
                        'status' => $this->failed,
                        'message' => 'Account has been Restricted on ENKPAY',
                    ], 500);

                }

                // $enkpay_profit = $deposit_charges - 10;

                // $message_amount = $Amount - 10;

                //credit
                // $enkpay_debit = $Amount - $deposit_charges;
                $updated_amount = $main_wallet + $settledAmount;
                $main_wallet = User::where('id', $user_id)
                    ->update([
                        'main_wallet' => $updated_amount,
                    ]);

                //update Transactions
                $trasnaction = new Transaction();
                $trasnaction->user_id = $user_id;
                $trasnaction->ref_trans_id = $trans_id;
                $trasnaction->e_ref = $settlementId;
                $trasnaction->type = "PROVIDUS FUNDING";
                $trasnaction->transaction_type = "VirtualFundWallet";
                $trasnaction->title = "Wallet Funding";
                $trasnaction->main_type = "Transfer";
                $trasnaction->credit = $settledAmount;
                $trasnaction->note = "$sourceAccountName | Wallet Funding";
                $trasnaction->fee = $feeAmount;
                $trasnaction->amount = $transactionAmount;
                $trasnaction->e_charges = $deposit_charges;
                $trasnaction->enkPay_Cashout_profit = 0;
                $trasnaction->trx_date = $tranDateTime;
                $trasnaction->p_sessionId = $sessionId;
                $trasnaction->trx_time = $tranDateTime;
                $trasnaction->sender_name = $sourceAccountName;
                $trasnaction->sender_bank = $sourceBankName;
                $trasnaction->sender_bank = $sourceBankName;
                $trasnaction->serial_no = $SerialNumber;
                $trasnaction->sender_account_no = $sourceAccountNumber;
                $trasnaction->balance = $updated_amount;
                $trasnaction->status = 1;
                $trasnaction->save();

                $errand_key = errand_api_key();

                $b_code = env('BCODE');

                $acct_no = $request->acct_no;

                $curl = curl_init();

                $datetime = new \DateTime ("now", new DateTimeZone("Europe/Bucharest"));

                $date1 = $datetime->format('Y-m-d');
                $date2 = $datetime->format('H:i:s');

                $data = array(

                    "Amount" => $transactionAmount,
                    "DateOfTransaction" => $date1 . "T" . $date2 . "+" . "01:00",
                    "SenderAccountNumber" => $sourceAccountNumber,
                    "SenderAccountName" => $sourceAccountName,
                    "OriginatorBank" => $sourceBankName,
                    "RecipientAccountNumber" => $VirtualCustomerAccount,
                    "RecipientAccountName" => $first_name . " " . $last_name,

                );

                $post_data = json_encode($data);

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.errandpay.com/epagentservice/api/v1/Webhook/Notify',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => $post_data,
                    CURLOPT_HTTPHEADER => array(
                        'epKey: ep_live_jFrIZdxqSzAdraLqbvhUfVYs',
                        'Content-Type: application/json',
                    ),
                ));

                $var = curl_exec($curl);
                curl_close($curl);
                $var = json_decode($var);

                $message = "Your Pool account has been credited |  $transactionAmount | from PROVIDUS Virtual account";

                send_notification($message);

                //send to user

                if ($user_email !== null) {

                    $data = array(
                        'fromsender' => 'noreply@enkpayapp.enkwave.com', 'EnkPay',
                        'subject' => "Virtual Account Credited",
                        'toreceiver' => $user_email,
                        'amount' => $transactionAmount,
                        'first_name' => $first_name,
                    );

                    Mail::send('emails.transaction.virtual-credit', ["data1" => $data], function ($message) use ($data) {
                        $message->from($data['fromsender']);
                        $message->to($data['toreceiver']);
                        $message->subject($data['subject']);
                    });
                }

                return response()->json([
                    'requestSuccessful' => true,
                    'sessionId' => $sessionId,
                    'responseMessage' => 'success',
                    'responseCode' => "00",
                ], 200);

            }

            $parametersJson = json_encode($request->all());
            $headers = json_encode($request->headers->all());
            $message = 'Key not Authorized';
            $ip = $request->ip();

            $result = " Header========> " . $headers . "\n\n Body========> " . $parametersJson . "\n\n Message========> " . $message . "\n\nIP========> " . $ip;
            send_notification($result);

            return response()->json([
                'requestSuccessful' => true,
                'sessionId' => $sessionId,
                'responseMessage' => 'Key not authorized',
                'responseCode' => "02",
            ], 200);

        } catch (\Exception $th) {
            return $th->getMessage();
        }

    }

}










