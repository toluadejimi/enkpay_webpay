<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Transaction;
use App\Models\Transfertransaction;
use App\Models\User;
use App\Models\Webkey;
use App\Models\Webtransfer;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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
            $data['all'] = $data['palmpay_count'] + $data['palmpay_count'] - $data['miss_count'] ;




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



    }




    public function login(request $request)
    {
        return view('login');


    }
    public function complete_transaction(request $request)
    {

        if($request->id == null){
            return back()->with('error', 'Transaction ID missing');

        }

        $trx = Webtransfer::where('trans_id', $request->id)->first() ?? null;
        if($trx == null){
            return back()->with('error', 'Transaction Not Found');
        }

        if($trx->status == 2){
            return back()->with('error', 'Transaction has been completed');
        }

        if($trx->status == 0){


            $charge = Setting::where('id', 1)->first()->webpay_transfer_charge;

            if($trx->payable_amount <= 100){
                $f_amount = $trx->payable_amount;
            }else{
                $f_amount = $trx->payable_amount - $charge;
            }

            User::where('id', $trx->user_id)->increment('main_wallet', $f_amount);
            $balance = User::where('id', $trx->user_id)->first()->main_wallet;
            $user = User::where('id', $trx->user_id)->first();



            $url = Webkey::where('key', $trx->key)->first()->url_fund ?? null;
            $user_email =  $trx->email ?? null;
            $amount =  $trx->payable_amount ?? null;
            $order_id =  $trx->trans_id ?? null;
            $site_name =  Webkey::where('key', $trx->key)->first()->site_name ?? null;




            $fund = credit_user_wallet($url, $user_email, $amount, $order_id);

            if($fund == 2){

                Webtransfer::where('trans_id', $request->id)->update(['status' => 4]);
                Transfertransaction::where('ref_trans_id', $request->id)->update(['status' => 2, 'approved_by'=>Auth::user()->first_name]);


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

                $message = "Business funded | $trx->manual_acc_ref | $f_amount | $user->first_name " . " " . $user->last_name."\n\n Approved by ====>".Auth::user()->first_name;
                send_notification($message);

                $message = "$trx->manual_acc_ref | NGN  $trx->payable_amount | $trx->email  | $site_name" ;
                send_notification($message);

                return back()->with('message', 'Transaction successfully completed');


            }



            Webtransfer::where('trans_id', $request->id)->update(['status' => 1]);
            Transfertransaction::where('ref_trans_id', $request->id)->update(['status' => 1, 'approved_by'=>Auth::user()->first_name]);


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

            $message = "Business Funded | $trx->manual_acc_ref | Pending customer not funded | $f_amount | $user->first_name " . " " . $user->last_name."\n\n Approved by ====>".Auth::user()->first_name;
            send_notification($message);

            return back()->with('message', 'Transaction successfully completed');




        }




        return view('login');


    }



    public function delete_transaction(request $request)
    {

        if($request->id == null){
            return back()->with('error', 'Transaction ID missing');

        }



            Webtransfer::where('trans_id', $request->id)->delete() ?? null;
            Transfertransaction::where('ref_trans_id', $request->id)->delete() ?? null;


            $message = "Transaction | $request->id | Deleted ";
            send_notification($message);

            return back()->with('message', 'Transaction Deleted Successfully');










    }

    public function pend_transaction(request $request)
    {

        if($request->id == null){
            return back()->with('error', 'Transaction ID missing');

        }


        Webtransfer::where('trans_id', $request->id)->update(['status' => 3]) ?? null;
        Transfertransaction::where('ref_trans_id', $request->id)->update(['status' => 3]) ?? null;



        $message = "Transaction | $request->id | added to pending ";
        send_notification($message);

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


    public function resolve()
    {
        return view('resolve');
    }


    public function deposit(request $request)
    {

        if($request->vendor == "logmarketplace"){

            $databody = array(

                "amount" => $request->amount,
                "email" => $request->user_email,
                "order_id" => $request->order_id,
            );

            $post_data = json_encode($databody);
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.logmarketplace.com/public/api/e-fund",
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


            if($status == true)
            {
                return back()->with('message', $status_message);
            }else{

                return back()->with('error', $status_message);


            }



        }

        if($request->vendor == "acelogs"){

            $databody = array(

                "amount" => $request->amount,
                "email" => $request->user_email,
                "order_id" => $request->order_id,
            );

            $post_data = json_encode($databody);
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.acelogstore.com/public/api/e-fund",
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


            if($status == true)
            {
                return back()->with('message', $status_message);
            }else{

                return back()->with('message', $status_message);


            }



        }

        if($request->vendor == "oprimeverify"){

            $databody = array(

                "amount" => $request->amount,
                "email" => $request->user_email,
                "order_id" => $request->order_id,
            );

            $post_data = json_encode($databody);
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://oprimeverify.com/api/fund",
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


            if($status == true)
            {
                return back()->with('message', $status_message);
            }else{

                return back()->with('message', $status_message);


            }



        }


        if($request->vendor == "oprime"){

            $databody = array(

                "amount" => $request->amount,
                "email" => $request->user_email,
                "order_id" => $request->order_id,
            );

            $post_data = json_encode($databody);
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://api.oprime.com.ng/public/api/e-fund",
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


            if($status == true)
            {
                return back()->with('message', $status_message);
            }else{

                return back()->with('message', $status_message);


            }



        }




        return view('resolve');
    }







}
