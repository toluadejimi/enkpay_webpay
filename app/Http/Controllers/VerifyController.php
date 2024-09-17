<?php

namespace App\Http\Controllers;

use App\Models\ResolveOrder;
use App\Models\Setting;
use App\Models\Support;
use App\Models\Transaction;
use App\Models\Transfertransaction;
use App\Models\User;
use App\Models\Webkey;
use App\Models\Webtransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class VerifyController extends Controller
{

    public function verify_view(request $request)
    {
        if (Auth::check() == false) {
            return view('login');
        }

        $currentDate = Carbon::today();


        if (Auth::user()->bank_operator == "all") {
            $data['status'] = Setting::where('id', 1)->first();
            $data['transactions'] = Transfertransaction::latest()->where('status', 0)->get();
            $data['opay_count'] = Transfertransaction::where('status', 1)->where('bank', "OPAY")->count();
            $data['palmpay_count'] = Transfertransaction::where('status', 1)->where('bank', "PALMPAY")->count();
            $data['miss_count'] = Transfertransaction::where('status', 1)->where('amount', 100.00)->count();


            $data['daily_opay_count'] = Transfertransaction::where([
                'status' => 1,
                'bank' => "OPAY",
            ])->whereDate('created_at', $currentDate)->count();

            $data['daily_palmpay_count'] = Transfertransaction::where([
                'status' => 1,
                'bank' => "PALMPAY",
            ])->whereDate('created_at', $currentDate)->count();


            $data['totaldaily'] = $data['opay_count'] + $data['daily_palmpay_count'];
            $data['all'] = $data['palmpay_count'] + $data['palmpay_count'] - $data['miss_count'];

            $data['support'] = Support::where('id', 1)->first()->support;


            return view('payment', $data);
        }

        if (Auth::user()->bank_operator == "opay") {
            $data['status'] = Setting::where('id', 1)->first();
            $data['transactions'] = Transfertransaction::latest()->where('status', 0)->where('bank', "OPAY")->get() ?? null;
            return view('payment', $data);

        }

        if (Auth::user()->bank_operator == "palmpay") {
            $data['status'] = Setting::where('id', 1)->first();
            $data['transactions'] = Transfertransaction::latest()->where('status', 0)->where('bank', "PALMPAY")->get() ?? null;
            return view('payment', $data);

        }


        if (Auth::user()->bank_operator == "kuda") {
            $data['status'] = Setting::where('id', 1)->first();
            $data['transactions'] = TransactionController::latest()->where('status', 0)->where('bank', "KUDA")->get() ?? null;
            return view('payment', $data);

        }


        return back()->with('error', "You dont have any business here");


    }

    public function change_support(request $request)
    {
        Support::where('id', 1)->update(['number' => $request->support]);
        return back()->with('message', "Support Has been updated");

    }

    public function login_now(request $request)
    {

        $user = User::where('email', $request->email)->first() ?? null;
        if ($user == null) {
            return back()->with('error', "Account Not Found");
        }

        if ($user->status == 9) {
            return back()->with('error', "Not permitted to login");
        }

        if ($user->role == 9 && $user->status == 2)
            $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('payment'); // Redirect to dashboard or any other authenticated page
        }

        return back()->with('error', 'Email or password incorrect');


    }


    public function pending_transaction(request $request)
    {


        if (Auth::check() == false) {
            return view('login');
        }

        $currentDate = Carbon::today();


        $data['transactions'] = Transfertransaction::latest()->where('status', 0)->orwhere('status', 3)->get();

        return view('pend', $data);

    }


    public function login(request $request)
    {
        return view('login');


    }

    public function complete_transaction(request $request)
    {

        if ($request->id == null) {
            return back()->with('error', 'Transaction ID missing');

        }

        $trx = Webtransfer::where('trans_id', $request->id)->first() ?? null;
        if ($trx == null) {
            return back()->with('error', 'Transaction Not Found');
        }

        if ($trx->status == 2) {
            return back()->with('error', 'Transaction has been completed');
        }


        if ($trx->status == 0) {
            $charge = Setting::where('id', 1)->first()->webpay_transfer_charge;

            if ($trx->payable_amount <= 100) {
                $f_amount = $trx->payable_amount;
            } else {
                $f_amount = $trx->payable_amount - $charge;
            }

            User::where('id', $trx->user_id)->increment('main_wallet', $f_amount);
            $balance = User::where('id', $trx->user_id)->first()->main_wallet;
            $user = User::where('id', $trx->user_id)->first();


            $url = Webkey::where('key', $trx->key)->first()->url_fund ?? null;
            $user_email = $trx->email ?? null;
            $amount = $trx->payable_amount ?? null;
            $order_id = $trx->trans_id ?? null;
            $site_name = Webkey::where('key', $trx->key)->first()->site_name ?? null;
            $bank = $trx->bank;


            $type = "manual";
            $fund = credit_user_wallet($url, $user_email, $amount, $order_id, $type);

            if ($fund == 2) {
                Webtransfer::where('trans_id', $request->id)->update(['status' => 4]);
                Transfertransaction::where('ref_trans_id', $request->id)->update([
                    'status' => 4,
                    'approved_by' => Auth::user()->first_name,
                    'email' => $trx->email,
                ]);


                //update Transactions
                $trasnaction = new Transaction();
                $trasnaction->user_id = $trx->user_id;
                $trasnaction->e_ref = $trx->manual_acc_ref;
                $trasnaction->ref_trans_id = $request->id;
                $trasnaction->type = "webpay";
                $trasnaction->transaction_type = "VirtualFundWallet";
                $trasnaction->title = "Wallet Funding";
                $trasnaction->main_type = "Transfer";
                $trasnaction->credit = $f_amount;
                $trasnaction->note = "Transaction Successful | Web Pay ";
                $trasnaction->fee = $charge ?? 0;
                $trasnaction->amount = $trx->payable_amount;
                $trasnaction->e_charges = 0;
                $trasnaction->enkPay_Cashout_profit = 0;
                $trasnaction->balance = $balance;
                $trasnaction->status = 1;
                $trasnaction->save();

                $message = "Business funded | $trx->manual_acc_ref | $f_amount | $user->first_name " . " " . $user->last_name . "\n\n Approved by ====>" . Auth::user()->first_name;
                Log::info('Business Funded', ['message' => $message]);


                $date = date('d M Y H:i:s');
                $message = "$trx->manual_acc_ref | NGN  $trx->payable_amount | $trx->email  | $site_name | $date | has been funded";
                Log::info('User Funded', ['message' => $message]);

                return back()->with('message', 'Transaction successfully completed');


            }


            Webtransfer::where('trans_id', $request->id)->update(['status' => 1]);
            Transfertransaction::where('ref_trans_id', $request->id)->update(['status' => 1, 'approved_by' => Auth::user()->first_name]);


            //update Transactions
            $trasnaction = new Transaction();
            $trasnaction->user_id = $trx->user_id;
            $trasnaction->e_ref = $trx->manual_acc_ref;
            $trasnaction->ref_trans_id = $request->id;
            $trasnaction->type = "webpay";
            $trasnaction->transaction_type = "VirtualFundWallet";
            $trasnaction->title = "Wallet Funding";
            $trasnaction->main_type = "Transfer";
            $trasnaction->credit = $f_amount;
            $trasnaction->note = "Transaction Successful | Web Pay ";
            $trasnaction->fee = $charge ?? 0;
            $trasnaction->amount = $trx->payable_amount;
            $trasnaction->e_charges = 0;
            $trasnaction->enkPay_Cashout_profit = 0;
            $trasnaction->balance = $balance;
            $trasnaction->status = 1;
            $trasnaction->save();

            $message = "Business Funded | $trx->manual_acc_ref | Pending customer not funded | $f_amount | $user->first_name " . " " . $user->last_name . "\n\n Approved by ====>" . Auth::user()->first_name;
            Log::info('Business Funded', ['message' => $message]);

            // send_notification($message);

            return back()->with('message', 'Transaction successfully completed');


        }


        return view('login');


    }


    public function delete_transaction(request $request)
    {

        if ($request->id == null) {
            return back()->with('error', 'Transaction ID missing');

        }


            Webtransfer::where('trans_id', $request->id)->delete() ?? null;
            Transfertransaction::where('ref_trans_id', $request->id)->delete() ?? null;


        $message = "Transaction | $request->id | Deleted ";
        Log::info('Notification', ['message' => $message]);

        // send_notification($message);

        return back()->with('message', 'Transaction Deleted Successfully');


    }

    public function pend_transaction(request $request)
    {

        if ($request->id == null) {
            return back()->with('error', 'Transaction ID missing');

        }


            Webtransfer::where('trans_id', $request->id)->update(['status' => 3]) ?? null;
            Transfertransaction::where('ref_trans_id', $request->id)->update(['status' => 3]) ?? null;


        $message = "Transaction | $request->id | added to pending ";
        Log::info('Notification', ['message' => $message]);

        //send_notification($message);

        return back()->with('message', 'Transaction added to pending Successfully');


    }


    public function offpalmpay_account()
    {
        Setting::where('palmpay_trx', 1)->update(['palmpay_trx' => 0]);
        return back()->with('message', "Palmpay Account is off");
    }

    public function onpalmpay_account()
    {
        Setting::where('palmpay_trx', 0)->update(['palmpay_trx' => 1]);
        return back()->with('message', "Palmpay Account is ON");
    }


    public function offopay_account()
    {
        Setting::where('opay_trx', 1)->update(['opay_trx' => 0]);
        return back()->with('message', "Opay Account is off");
    }

    public function onopay_account()
    {
        Setting::where('opay_trx', 0)->update(['opay_trx' => 1]);
        return back()->with('message', "Opay Account is ON");
    }

    public function offkuda_account()
    {
        Setting::where('kuda_trx', 1)->update(['kuda_trx' => 0]);
        return back()->with('message', "KUDA Account is off");
    }

    public function onkuda_account()
    {
        Setting::where('kuda_trx', 0)->update(['kuda_trx' => 1]);
        return back()->with('message', "Kuda Account is ON");
    }


    public function offpro_account()
    {
        Setting::where('pay_with_providus', 1)->update(['pay_with_providus' => 0]);
        return back()->with('message', "Providus Account is off");
    }

    public function onpro_account()
    {
        Setting::where('pay_with_providus', 0)->update(['pay_with_providus' => 1]);
        return back()->with('message', "Providus Account is ON");
    }


    public function resolve(request $request)
    {
        $data['user_id'] = $request->user_id;
        $data['check_url'] = $request->check_url;
        $data['currentUrl'] =  Webkey::where('key', $request->user_id)->first()->support_number ?? null;
        return view('resolve', $data);
    }


    public function decline_approve(request $request)
    {
        $order = ResolveOrder::where('id', $request->id)->first() ?? null;

        ResolveOrder::where('id', $order->id)->update(['status' => 3]);
        return back()->with('error', "Ticket has been declined");
    }


    public function deposit_approve(request $request)
    {

        $order = ResolveOrder::where('id', $request->id)->first() ?? null;

        if ($order == null) {
            return back()->with('error', 'User Api Url not found');
        }


        $vendor_url = Webkey::where('key', $order->user_id)->first()->url_fund ?? null;
        $user_id = Webkey::where('key', $order->user_id)->first()->user_id ?? null;
        $user = User::where('id', $user_id)->first() ?? null;


        $site_name = Webkey::where('key', $order->user_id)->first()->site_name ?? null;


        if ($vendor_url == null) {
            return back()->with('error', 'User Api Url not found');
        }

        $reff = date('ymdhms') . "APIFUND";

        $databody = array(

            "amount" => $order->r_amount,
            "email" => $order->email,
            "order_id" => $reff,
        );


        $post_data = json_encode($databody);

        ResolveOrder::where('id', $order->id)->update(['status' => 1]);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "$vendor_url",
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
        $status = $var->status ?? null;
        $status_message = $var->message ?? null;

        if ($status == true) {


            $charge = Setting::where('id', 1)->first()->webpay_transfer_charge;

            if ($order->r_amount <= 100) {
                $f_amount = $order->r_amount;
            } else {
                $f_amount = $order->r_amount - $charge;
            }

            User::where('id', $user_id)->increment('main_wallet', $f_amount);
            $balance = User::where('id', $user_id)->first()->main_wallet;
            $user = User::where('id', $user_id)->first();

            //update Transactions
            $trasnaction = new Transaction();
            $trasnaction->user_id = $user_id;
            $trasnaction->e_ref = $reff;
            $trasnaction->ref_trans_id = $reff;
            $trasnaction->type = "webpay";
            $trasnaction->transaction_type = "VirtualFundWallet";
            $trasnaction->title = "Wallet Funding";
            $trasnaction->main_type = "Transfer";
            $trasnaction->credit = $f_amount;
            $trasnaction->note = "Transaction Successful | Web Pay ";
            $trasnaction->fee = $charge ?? 0;
            $trasnaction->amount = $order->r_amount;
            $trasnaction->e_charges = 0;
            $trasnaction->enkPay_Cashout_profit = 0;
            $trasnaction->balance = $balance;
            $trasnaction->status = 1;
            $trasnaction->save();


            $trx = new Transfertransaction();
            $trx->amount = $order->r_amount;
            $trx->ref = $reff;
            $trx->ref_trans_id = $reff;
            $trx->email = $order->email;
            $trx->transaction_type = "WEBTRASNSFER";
            $trx->bank = "Resolve";
            $trx->status = 2;
            $trx->user_id = $user_id;
            $trx->save();


            $message = "Business funded | $reff | $f_amount | $user->first_name " . " " . $user->last_name;
            Log::info('Business Funded', ['message' => $message]);

            //send_notification($message);

            $date = date('d M Y H:i:s');
            $message = "$reff | $order->ref | NGN  $order->r_amount | $order->email  | $site_name | $date | has been funded";
            Log::info('Business Funded', ['message' => $message]);


            //            send_notification($message);
//            send_notification2($message);
//            send_notification3($message);

            $order = ResolveOrder::where('id', $request->id)->first() ?? null;
            ResolveOrder::where('id', $order->id)->update(['status' => 1]);


            return back()->with('message', 'Transaction successfully completed');


        } else {

            return back()->with('error', $status_message);
        }

    }


    public
    function all_request_view(request $request)
    {
        if (Auth::check() == false) {
            return view('login');
        }
        $data['title'] = "All Issues";
        $data['tickets'] = ResolveOrder::latest()->where('status', 0)->get();
        return view('request', $data);
    }


    public
    function hold(request $request)
    {
        if (Auth::check() == false) {
            return view('login');
        }
        $data['title'] = "Hold";
        $data['tickets'] = ResolveOrder::latest()->where('status', 5)->get();
        return view('request', $data);
    }


    public
    function approved(request $request)
    {

        if (Auth::check() == false) {
            return view('login');
        }
        $data['title'] = "Approved";
        $data['tickets'] = ResolveOrder::latest()->where('status', 1)->paginate(50);
        return view('request', $data);


    }

    public
    function search(request $request)
    {

        $data['title'] = "Approved";
        $data['tickets'] = ResolveOrder::latest()->where('email', $request->email)->paginate(50);
        return view('request', $data);


    }


    public
    function noref_request_view(request $request)
    {
        if (Auth::check() == false) {
            return view('login');
        }
        $data['title'] = "No Refrence";
        $data['tickets'] = ResolveOrder::latest()->where('status', 0)->where('subject', 1)->get();
        return view('request', $data);
    }


    public
    function opay_ticket_view(request $request)
    {
        if (Auth::check() == false) {
            return view('login');
        }
        $data['title'] = "Opay Ticket";
        $data['tickets'] = ResolveOrder::latest()->where('pay_type', "opay")->where('status', 0)->get();
        return view('request', $data);
    }

    public
    function ninepsb_ticket_view(request $request)
    {
        if (Auth::check() == false) {
            return view('login');
        }
        $data['title'] = "9psb Ticket";
        $data['tickets'] = ResolveOrder::latest()->where('pay_type', "9PSB")->where('status', 0)->get();
        return view('request', $data);
    }


    public
    function palmpay_ticket_view(request $request)
    {
        if (Auth::check() == false) {
            return view('login');
        }
        $data['title'] = "9psb Ticket";
        $data['tickets'] = ResolveOrder::latest()->where('pay_type', "palmpay")->where('status', 0)->get();
        return view('request', $data);
    }


    public
    function no_credit_view(request $request)
    {
        if (Auth::check() == false) {
            return view('login');
        }

        $data['title'] = "Refrence but not processed";
        $data['tickets'] = ResolveOrder::latest()->where('status', 0)->where('subject', 3)->get();
        return view('request', $data);
    }

    public
    function wrong_amount_view(request $request)
    {
        if (Auth::check() == false) {
            return view('login');
        }

        $data['title'] = "Wrong Amount";
        $data['tickets'] = ResolveOrder::latest()->where('status', 0)->where('subject', 2)->get();
        return view('request', $data);
    }


    public
    function deposit_funded(request $request)
    {
        $order = ResolveOrder::where('id', $request->id)->first() ?? null;
        ResolveOrder::where('id', $order->id)->update(['status' => 4]);
        return back()->with('message', 'Transaction funded');
    }

    public
    function hold_ticket(request $request)
    {
        $order = ResolveOrder::where('id', $request->id)->first() ?? null;
        ResolveOrder::where('id', $order->id)->update(['status' => 5]);
        return back()->with('message', 'Transaction Moveed');
    }


    public
    function deposit_delete(request $request)
    {
        ResolveOrder::where('id', $request->id)->delete();
        return redirect('all-issues')->with('message', 'Transaction deleted');
    }


    public
    function track_request_view(request $request)
    {
        $data['orders'] = ResolveOrder::where('email', $request->email)->count();
        $data['tickets'] = ResolveOrder::where('email', $request->email)->get();


        return view('track-request', $data);
    }


    public
    function request_order(request $request)
    {
        $data['orders'] = ResolveOrder::where('email', $request->email)->count();
        $data['tickets'] = ResolveOrder::where('email', $request->email)->get();


        if ($data['orders'] == 0) {
            return back()->with('error', "No resolve found with email $request->email");
        }

        return view('track-request', $data);

    }


    public
    function submit_resolve(request $request)
    {

        if ($request->username == "Not Found, Pleas try again") {
            return back()->with('error', "Please verify your email before your proceed");
        }


        if ($request->r_amount == null) {
            return back()->with('error', "Please enter the amount on your receipt");
        }

        if ($request->d_amount == null) {
            return back()->with('error', "Please enter the amount you deposited on the site");
        }


        if ($request->r_amount > 100000) {
            return back()->with('error', "Please enter the amount on your bank receipt");
        }

        if ($request->d_amount > 100000) {
            return back()->with('error', "Please enter the amount you deposited on the site");
        }





        if ($request->receipt != null) {

            $file = $request->file('receipt');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . 'upload/receipt';
            $request->receipt->move(public_path('upload/receipt'), $fileName);
            $file_url = url('') . "/public/upload/receipt/$fileName";


            $tk = new ResolveOrder();
            $tk->email = $request->email;
            $tk->subject = $request->subject;
            $tk->ref = $request->ref;
            $tk->pay_type = $request->pay_type;
            $tk->d_amount = $request->d_amount;
            $tk->r_amount = $request->r_amount;
            $tk->recepit = $file_url;
            $tk->n_time = $request->n_time;
            $tk->session = $request->t_session;
            $tk->r_phone = $request->r_phone;
            $tk->user_id = $request->user_id;
            $tk->username = $request->username;

            $tk->save();


        } else {

            $tk = new ResolveOrder();
            $tk->email = $request->email;
            $tk->subject = $request->subject;
            $tk->ref = $request->ref;
            $tk->d_amount = $request->d_amount;
            $tk->r_amount = $request->r_amount;
            $tk->n_time = $request->n_time;
            $tk->pay_type = $request->pay_type;
            $tk->session = $request->t_session;
            $tk->r_phone = $request->r_phone;
            $tk->save();

        }


        $message = "You have new message on support by $request->email";
        send_notification($message);
        send_notification_opay($message);

        return view('success-ticket');

    }



    public function reslove_wema_view(request $request)
    {

        $data['email'] = $request->email;
        $data['user_id'] = $request->user_id;
        $data['check_url'] = $request->check_url;
        $data['currentUrl'] = Webkey::where('key', $request->user_id)->first()->support_number ?? null;
        $data['type'] = "wema";

        return view('sessionresolve', $data);

    }

    public function reslove_psb_view(request $request)
    {



        $data['currentUrl'] = url()->current();
        $data['email'] = $request->email;
        $data['user_id'] = $request->user_id;
        $data['check_url'] = $request->check_url;
        $data['type'] = "ninepsb";
        $data['currentUrl'] = Webkey::where('key', $request->user_id)->first()->support_number ?? null;


        return view('sessionresolve', $data);
    }



    public function reslove_psb(request $request)
    {



        $message = "9psb Resolve Request ====>".json_encode($request->all());
        send_notification($message);


        if($request->username == "Not Found, Pleas try again"){
            return back()->with('error', 'Email is invalid, please try again');
        }


        $url = $request->url;
        $ckstatus = Transfertransaction::where('account_no', $request->account_no)->first()->status ?? null;
        $email = Transfertransaction::where('account_no', $request->account_no)->first()->email ?? null;



        if ($ckstatus == "4") {
            return back()->with('error', "Transaction has already been funded to $email, Please go back to site to check your wallet");
        }



        if ($ckstatus == "2" || $ckstatus == "3") {



            Transfertransaction::where('account_no', $request->account_no)->update(['status' => 4, 'note' => '9PSBRESOLVE', 'resolve' => 1]);
            $curl = curl_init();
            $data = array(
                'account_no' => $request->account_no,
            );
            $post_data = json_encode($data);

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://etopagency.com/api/session-check',
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


            dd($var);

            $session_id = $var->session_id ?? null;
            $acct_no = $var->account_no ?? null;
            $amt = $var->amount ?? null;
            $name = $var->sender_name ?? null;
            $status = $var->status ?? null;
            $message = $var->messsage ?? null;


            if ($status == false) {
                return back()->with('error', $message);
            }


            $urlkey = Webkey::where('key', $request->user_id)->first()->user_id ?? null;
            $balance = User::where('id', $urlkey)->first()->main_wallet;
            $user = User::where('id', $urlkey)->first();
            $url = Webkey::where('key', $request->user_id)->first()->url_fund ?? null;
            $urluser = Webkey::where('key', $request->user_id)->first()->user_url ?? null;


            $user_email = $request->email ?? null;
            $order_id = $session_id ?? null;
            $site_name = Webkey::where('key', $request->user_id)->first()->site_name ?? null;




            $trxxc = Transfertransaction::where('account_no', $request->account_no)->first() ?? null;
            if($trxxc == null){
                $svtrx = new Transfertransaction();
                $svtrx->account_no = $request->account_no;
                $svtrx->status = 4;
                $svtrx->amount = $amt;
                $svtrx->email = $request->email;
                $svtrx->note = "PSBRESOLVE";
                $svtrx->user_id = $user->id;
                $svtrx->transaction_type = "Resolve";
                $svtrx->save();
            }




            $set = Setting::where('id', 1)->first();
            if ($amt > 15000) {
                $p_amount = $amt - $set->psb_cap;
            } else {
                $p_amount = $amt - $set->psb_charge;
            }



            //fund Vendor
            $charge = Setting::where('id', 1)->first()->webpay_transfer_charge;
            if ($amt <= 100) {
                $f_amount = $amt;
            } else {
                $f_amount = $amt - $charge;
            }

            $amount = $f_amount;


            $type = "presolve";
            $fund = credit_user_wallet($url, $user_email, $amount, $order_id, $type);

            if ($fund == 2) {

                //update Transactions
                $trasnaction = new Transaction();
                $trasnaction->user_id = $urlkey;
                $trasnaction->e_ref = $request->sessionid;
                $trasnaction->ref_trans_id = $request->sessionid;
                $trasnaction->type = "webpay";
                $trasnaction->transaction_type = "VirtualFundWallet";
                $trasnaction->title = "Wallet Funding";
                $trasnaction->main_type = "Transfer";
                $trasnaction->credit = $f_amount;
                $trasnaction->note = "Transaction Successful | Web Pay ";
                $trasnaction->fee = $charge ?? 0;
                $trasnaction->amount = $amt;
                $trasnaction->e_charges = 0;
                $trasnaction->enkPay_Cashout_profit = 0;
                $trasnaction->balance = $balance;
                $trasnaction->status = 1;
                $trasnaction->save();

                $trxa = Transfertransaction::where('account_no', $acct_no)->first() ?? null;
                if($trxa == null){
                    $trx = new Transfertransaction();
                    $trx->account_no = $acct_no;
                    $trx->amount = $f_amount;
                    $trx->ref = $var->session_id;
                    $trx->ref_trans_id = $session_id;
                    $trx->email = $request->email;
                    $trx->session_id = $session_id;
                    $trx->bank = "9PSBRESLOVE";
                    $trx->resolve = 1;
                    $trx->transaction_type = "WEBTRASNSFER";
                    $trx->status = 4;
                    $trx->user_id = $urlkey;
                    $trx->save();

                }else{
                    Transfertransaction::where('account_no', $acct_no)->update(['status' => 4, 'note' => '9PSBRESOLVE', 'resolve' => 1]);
                }


                $date = date('d M Y H:i:s');
                $message = $acct_no . " | NGN  $amt | $request->email  | $site_name | $date | has been funded";
                //Log::info('User Funded', ['message' => $message]);
                send_notification($message);

                $data['trans'] = $request->sessionid;
                $data['recepit'] = "payment";
                $data['url_page'] = $urluser;
                $data['amount'] = $f_amount;

                return view('paid-success', $data);


            }

        }


        if($ckstatus == null){

            $curl = curl_init();
            $data = array(
                'account_no' => $request->account_no,
            );
            $post_data = json_encode($data);

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://etopagency.com/api/session-check',
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

            $session_id = $var->session_id ?? null;
            $acct_no = $var->account_no ?? null;
            $amt = $var->amount ?? null;
            $name = $var->sender_name ?? null;
            $rrstatus = $var->status ?? null;
            $message = $var->message ?? null;

            if ($rrstatus == false) {
                return back()->with('error', $message.",  Please try again later...");
            }

            if($rrstatus == true){
                $urlkey = Webkey::where('key', $request->user_id)->first()->user_id ?? null;
                $balance = User::where('id', $urlkey)->first()->main_wallet;
                $user = User::where('id', $urlkey)->first();
                $url = Webkey::where('key', $request->user_id)->first()->url_fund ?? null;
                $urluser = Webkey::where('key', $request->user_id)->first()->user_url ?? null;

                $user_email = $request->email ?? null;
                $order_id = $session_id ?? null;
                $site_name = Webkey::where('key', $request->user_id)->first()->site_name ?? null;


                $trxxc = Transfertransaction::where('account_no', $request->account_no)->first() ?? null;
                if($trxxc == null){
                    $svtrx = new Transfertransaction();
                    $svtrx->account_no = $request->account_no;
                    $svtrx->status = 4;
                    $svtrx->amount = $amt;
                    $svtrx->email = $request->email;
                    $svtrx->note = "PSBRESOLVE";
                    $svtrx->user_id = $user->id;
                    $svtrx->transaction_type = "Resolve";
                    $svtrx->save();
                }


                $set = Setting::where('id', 1)->first();
                if ($amt > 15000) {
                    $p_amount = $amt - $set->psb_cap;
                } else {
                    $p_amount = $amt - $set->psb_charge;
                }

                $ckstatus = Transfertransaction::where('account_no', $request->account_no)->first()->status ?? null;
                $email = Transfertransaction::where('account_no', $request->account_no)->first()->email ?? null;
                $urlkey = Webkey::where('key', $request->user_id)->first()->user_id ?? null;


                //fund Vendor
                $charge = Setting::where('id', 1)->first()->webpay_transfer_charge;
                if ($amt <= 100) {
                    $f_amount = $amt;
                } else {
                    $f_amount = $amt - $charge;
                }

                $amount = $f_amount;


                $type = "presolve";
                //fund user
                $fund = credit_user_wallet($url, $user_email, $amount, $order_id, $type);
                if ($fund == 2) {
                    //update Transactions
                    $trasnaction = new Transaction();
                    $trasnaction->user_id = $urlkey;
                    $trasnaction->e_ref = $request->sessionid;
                    $trasnaction->ref_trans_id = $request->sessionid;
                    $trasnaction->type = "webpay";
                    $trasnaction->transaction_type = "VirtualFundWallet";
                    $trasnaction->title = "Wallet Funding";
                    $trasnaction->main_type = "Transfer";
                    $trasnaction->credit = $f_amount;
                    $trasnaction->note = "Transaction Successful | Web Pay ";
                    $trasnaction->fee = $charge ?? 0;
                    $trasnaction->amount = $amt;
                    $trasnaction->e_charges = 0;
                    $trasnaction->enkPay_Cashout_profit = 0;
                    $trasnaction->balance = $balance;
                    $trasnaction->status = 1;
                    $trasnaction->save();

                    $trxa = Transfertransaction::where('account_no', $acct_no)->first() ?? null;
                    if($trxa == null){
                        $trx = new Transfertransaction();
                        $trx->account_no = $acct_no;
                        $trx->amount = $f_amount;
                        $trx->ref = $var->session_id;
                        $trx->ref_trans_id = $session_id;
                        $trx->email = $request->email;
                        $trx->session_id = $session_id;
                        $trx->bank = "9PSBRESLOVE";
                        $trx->resolve = 1;
                        $trx->transaction_type = "WEBTRASNSFER";
                        $trx->status = 4;
                        $trx->user_id = $urlkey;
                        $trx->save();

                    }else{
                        Transfertransaction::where('account_no', $acct_no)->update(['status' => 4, 'note' => '9PSBRESOLVE', 'resolve' => 1]);
                    }



                    //$message = "Business funded | $request->sessionid | $f_amount | $user->first_name " . " " . $user->last_name;
                    //Log::info('Business Funded', ['message' => $message]);

                    //send_notification($message);

                    $date = date('d M Y H:i:s');
                    $message = $acct_no . " | NGN  $amt | $request->email  | $site_name | $date | has been funded";
                    //Log::info('User Funded', ['message' => $message]);
                    send_notification($message);

                    $data['trans'] = $request->sessionid;
                    $data['recepit'] = "payment";
                    $data['url_page'] = $urluser;
                    $data['amount'] = $f_amount;

                    return view('paid-success', $data);


                }

            }



        }





            return back()->with('error', 'Account number you provided is not correct, please check and try again');



    }


    public function reslove_wema(request $request)
    {

        $message = "Wema Resolve Request ====>".json_encode($request->all());
        send_notification_resolve($message);


        if($request->username == "Not Found, Pleas try again"){
            return back()->with('error', 'Email is invalid, please try again');
        }



        $url = $request->url;
        $ckstatus = Transfertransaction::where('account_no', $request->account_no)->first()->status ?? null;
        $email = Transfertransaction::where('account_no', $request->account_no)->first()->email ?? null;

        if ($ckstatus == 4) {
            return back()->with('error', "Transaction has already been funded to $email, Please go back to site to check your wallet");
        }


        if ($ckstatus == null || $ckstatus == 0 || $ckstatus == 3) {

            $status = Transfertransaction::where('account_no', $request->account_no)->first()->status ?? null;
            $email = Transfertransaction::where('account_no', $request->account_no)->first()->email ?? null;

            if ($status == 4) {
                return back()->with('error', "Transaction has already been funded to $email, Please go back to site to check your wallet");
            }

            $ref = $request->account_no;
            $var = verify_payment($ref);

            if($var == 0){
                return back()->with('error', 'Somthing went wrong');
            }


            $session_id = $request->account_no ?? null;
            $acct_no = $var->account_no ?? null;
            $amt = $var['amount'] ?? null;
            $status = $var['transactionStatus'] ?? null;
            $amountCollected = $var['amountCollected'];


            if ($status == "PartPayment") {
                return back()->with('error', "Incomplete Amount Received\n, You paid NGN". $amt. " instead of NGN ".$amountCollected ."\n Note that the funds will be refunded back to your account" );
            }

            if ($status == "Processing") {
                return back()->with('error', 'We have not confirmed your payment yet its still processing, please try again later');
            }

            if ($status == "Failed") {
                $emessage = $var['message'];
                return back()->with('error',  "You pay ".$emessage);
            }

            if ($status == false) {
                return back()->with('error', 'Account No Check failed, Kindly verify the Account No  and try again');
            }



            if ($status == "Successful") {


                $urlkey = Webkey::where('key', $request->user_id)->first()->user_id ?? null;
                $user = User::where('id', $urlkey)->first();


                $svtrx = new Transfertransaction();
                $svtrx->account_no = $request->account_no;
                $svtrx->status = 4;
                $svtrx->amount = $amt;
                $svtrx->note = "WEMARESOLVE";
                $svtrx->user_id = $user->id;
                $svtrx->transaction_type = "Resolve";
                $svtrx->save();


                $set = Setting::where('id', 1)->first();
                if ($amt > 15000) {
                    $p_amount = $amt - $set->psb_cap;
                } else {
                    $p_amount = $amt - $set->psb_charge;
                }

                $urlkey = Webkey::where('key', $request->user_id)->first()->user_id ?? null;

                //fund Vendor
                $charge = Setting::where('id', 1)->first()->webpay_transfer_charge;
                if ($amt <= 100) {
                    $f_amount = $amt;
                } else {
                    $f_amount = $amt - $charge;
                }

                $urlkey = Webkey::where('key', $request->user_id)->first()->user_id ?? null;
                $balance = User::where('id', $urlkey)->first()->main_wallet;
                $user = User::where('id', $urlkey)->first();
                $url = Webkey::where('key', $request->user_id)->first()->url_fund ?? null;
                $urluser = Webkey::where('key', $request->user_id)->first()->user_url ?? null;


                $user_email = $request->email ?? null;
                $amount = $f_amount ?? null;
                $order_id = $session_id ?? null;
                $site_name = Webkey::where('key', $request->user_id)->first()->site_name ?? null;

                $trasnaction = new Transaction();
                $trasnaction->user_id = $urlkey;
                $trasnaction->e_ref = $request->account_no;
                $trasnaction->ref_trans_id = $request->account_no;
                $trasnaction->type = "webpay";
                $trasnaction->transaction_type = "VirtualFundWallet";
                $trasnaction->title = "Wallet Funding";
                $trasnaction->main_type = "Transfer";
                $trasnaction->credit = $f_amount;
                $trasnaction->note = "Transaction Successful | Web Pay ";
                $trasnaction->fee = $charge ?? 0;
                $trasnaction->amount = $amt;
                $trasnaction->e_charges = 0;
                $trasnaction->enkPay_Cashout_profit = 0;
                $trasnaction->balance = $balance;
                $trasnaction->status = 1;
                $trasnaction->save();

                $date = date('d M Y H:i:s');
                $message = $acct_no . " | NGN  $amt | $request->email  | $site_name | $date | has been funded";
                //Log::info('User Funded', ['message' => $message]);
                send_notification($message);



                $type = "wresolve";
                //fund user
                $fund = credit_user_wallet($url, $user_email, $amount, $order_id, $type);
                if ($fund == 2) {

                    $date = date('dmy h:i:s');
                    $message = "Wema Resolve ======> $user_email has been funded NGN$amount \n| 0n $url \n using reslove | $request->account_no on $date";
                    send_notification_resolve($message);

                    $data['trans'] = $request->account_no;
                    $data['recepit'] = "payment";
                    $data['url_page'] = $urluser;
                    $data['amount'] = $amt;

                    return view('paid-success', $data);


                }

            }
            } elseif ($ckstatus == 2) {



            $status = Transfertransaction::where('account_no', $request->account_no)->first()->status ?? null;
            if ($status == 4) {
                return back()->with('error', 'Transaction has already been funded in your wallet, Please go back to site to check your wallet');
            }

            $ref = $request->account_no;


            Transfertransaction::where('account_no', $request->account_no)->update(['status' => 4, 'note' => '9PSBRESOLVE', 'resolve' => 1]);


            $var = verify_payment($ref);

            $session_id = $request->account_no ?? null;
            $acct_no = $var->account_no ?? null;
            $amt = $var['amount'] ?? null;
            $status = $var['transactionStatus'] ?? null;


            if ($status == "Processing") {
                return back()->with('error', 'We have not confirmed your payment yet its still processing, please try again later');
            }


            if ($status == "Failed") {
                $emessage = $var['message'];
                return back()->with('error',  "You pay ".$emessage);
            }


            if ($status == false) {
                return back()->with('error', 'Account No Check failed, Kindly verify the Account No  and try again');
            }

            if ($status == "Successful") {

                $urlkey = Webkey::where('key', $request->user_id)->first()->user_id ?? null;
                $user = User::where('id', $urlkey)->first();


                $svtrx = new Transfertransaction();
                $svtrx->account_no = $request->account_no;
                $svtrx->status = 4;
                $svtrx->amount = $amt;
                $svtrx->note = "WEMARESOLVE";
                $svtrx->user_id = $user->id;
                $svtrx->transaction_type = "Resolve";
                $svtrx->save();


                $set = Setting::where('id', 1)->first();
                if ($amt > 15000) {
                    $p_amount = $amt - $set->psb_cap;
                } else {
                    $p_amount = $amt - $set->psb_charge;
                }




                $urlkey = Webkey::where('key', $request->user_id)->first()->user_id ?? null;

                //fund Vendor
                $charge = Setting::where('id', 1)->first()->webpay_transfer_charge;
                if ($amt <= 100) {
                    $f_amount = $amt;
                } else {
                    $f_amount = $amt - $charge;
                }


                $urlkey = Webkey::where('key', $request->user_id)->first()->user_id ?? null;
                $balance = User::where('id', $urlkey)->first()->main_wallet;
                $user = User::where('id', $urlkey)->first();
                $url = Webkey::where('key', $request->user_id)->first()->url_fund ?? null;
                $urluser = Webkey::where('key', $request->user_id)->first()->user_url ?? null;


                $user_email = $request->email ?? null;
                $amount = $f_amount ?? null;
                $order_id = $session_id ?? null;
                $site_name = Webkey::where('key', $request->user_id)->first()->site_name ?? null;

                //fund user
                $type = "wresolve";
                $fund = credit_user_wallet($url, $user_email, $amount, $order_id, $type);


                if ($fund == 2) {

                    Transfertransaction::where('account_no', $request->account_no)->update(['status' => 4, 'note' => 'WEMARESOLVE', 'resolve' => 1]);
                    //update Transactions
                    $trasnaction = new Transaction();
                    $trasnaction->user_id = $urlkey;
                    $trasnaction->e_ref = $request->account_no;
                    $trasnaction->ref_trans_id = $request->account_no;
                    $trasnaction->type = "webpay";
                    $trasnaction->transaction_type = "VirtualFundWallet";
                    $trasnaction->title = "Wallet Funding";
                    $trasnaction->main_type = "Transfer";
                    $trasnaction->credit = $f_amount;
                    $trasnaction->note = "Transaction Successful | Web Pay ";
                    $trasnaction->fee = $charge ?? 0;
                    $trasnaction->amount = $amt;
                    $trasnaction->e_charges = 0;
                    $trasnaction->enkPay_Cashout_profit = 0;
                    $trasnaction->balance = $balance;
                    $trasnaction->status = 1;
                    $trasnaction->save();


                    $message = "Business funded | $request->account_no | $f_amount | $user->first_name " . " " . $user->last_name;
                    Log::info('Business Funded', ['message' => $message]);

                    // send_notification($message);

                    $date = date('d M Y H:i:s');
                    $message = $acct_no . " | NGN  $amt | $request->email  | $site_name | $date | has been funded";
                    //Log::info('User Funded', ['message' => $message]);
                    send_notification($message);

                    $data['trans'] = $request->account_no;
                    $data['recepit'] = "payment";
                    $data['url_page'] = $urluser;
                    $data['amount'] = $amt;

                    return view('paid-success', $data);


                }

            }
        } else {
            return back()->with('error', 'Account number you provided is not correct, please check and try again');
        }


        return back()->with('error', 'Resolve Error, Contact admin');


    }


    public
    function open_ticket(request $request)
    {

        $data['ticket'] = ResolveOrder::where('id', $request->id)->first() ?? null;
        $email = ResolveOrder::where('id', $request->id)->first() ?? null;

        if ($email != null) {
            $data['similar'] = ResolveOrder::where('email', $email->email)->get() ?? null;
        }

        return view('open-ticket', $data);

    }


    public
    function edit_ticket(request $request)
    {

        $data['ticket'] = ResolveOrder::where('id', $request->id)->first() ?? null;

        return view('edit-ticket', $data);

    }


    public
    function edit_now(request $request)
    {

        ResolveOrder::where('id', $request->id)->update([

            'email' => $request->email,
            'd_amount' => $request->d_amount,
            'r_amount' => $request->r_amount,
            'status' => $request->status

        ]);


        return redirect($url)->with('message', 'Ticket Updated successfully');


    }


}
