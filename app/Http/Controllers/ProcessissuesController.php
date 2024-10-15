<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Transaction;
use App\Models\Transfertransaction;
use App\Models\User;
use App\Models\Webkey;
use App\Models\Webtransfer;
use Illuminate\Http\Request;

class ProcessissuesController extends Controller
{
    public function process_issues(request $request)
    {

        $data['sites'] = Webkey::all();
        return view('process-issues', $data);


    }

    public function process_now(request $request)
    {

        $fund_url = Webkey::where('verify_url', $request->site_url)->first()->url_fund;
        $user_id = Webkey::where('verify_url', $request->site_url)->first()->user_id;

        if($request->fund_agent == "on"){

            $set = Setting::where('id', 1)->first();
            if ($request->amount > 15000) {
                $p_amount = $request->amount - $set->psb_cap;
            } else {
                $p_amount = $request->amount - $set->psb_charge;
            }


            User::where('id', $user_id)->increment('main_wallet', $p_amount);
            $balance = User::where('id', $user_id)->first()->main_wallet;
            $user = User::where('id', $user_id)->first();


            $url = Webkey::where('verify_url', $request->site_url)->first()->url_fund;
            $user_email = $request->email ?? null;
            $amount = $p_amount;
            $order_id = "DIRECTRESOLVE".random_int(000000000, 999999999);
            $site_name = Webkey::where('verify_url', $request->site_url)->first()->site_name;



            $trasnaction = new Transaction();
            $trasnaction->user_id = $user_id;
            $trasnaction->e_ref = "DIRECT RESOLVE";
            $trasnaction->ref_trans_id = $order_id;
            $trasnaction->type = "webpay";
            $trasnaction->transaction_type = "VirtualFundWallet";
            $trasnaction->title = "Wallet Funding";
            $trasnaction->main_type = "DIRECT RESOLVE";
            $trasnaction->credit = $p_amount;
            $trasnaction->note = "Direct Resolve | for $user_email";
            $trasnaction->fee = $fee ?? 0;
            $trasnaction->amount = $request->amount;
            $trasnaction->e_charges = 0;
            $trasnaction->charge = $payable ?? 0;
            $trasnaction->enkPay_Cashout_profit = 0;
            $trasnaction->balance = $balance;
            $trasnaction->status = 1;
            $trasnaction->save();
            $message = "Business funded | Direct resolve for | $user_email | $p_amount | $user->first_name " . " " . $user->last_name;
            send_notification($message);


            $type ="epayment";
            $session_id = "DRESOLVE";
            $fund = credit_user_wallet($url, $user_email, $amount, $order_id, $type, $session_id);


            return back()->with('message', "$user_email has been funded  NGN$amount on $site_name");



        }else{


            $set = Setting::where('id', 1)->first();
            if ($request->amount > 15000) {
                $p_amount = $request->amount - $set->psb_cap;
            } else {
                $p_amount = $request->amount - $set->psb_charge;
            }


            User::where('id', $user_id)->increment('main_wallet', $p_amount);
            $balance = User::where('id', $user_id)->first()->main_wallet;
            $user = User::where('id', $user_id)->first();


            $url = Webkey::where('verify_url', $request->site_url)->first()->url_fund;
            $user_email = $request->email ?? null;
            $amount = $p_amount;
            $order_id = "DIRECT RESOLVE";
            $site_name = Webkey::where('verify_url', $request->site_url)->first()->site_name;

            $type ="epayment";
            $session_id = "DRESOLVE";
            $fund = credit_user_wallet($url, $user_email, $amount, $order_id, $type, $session_id);
            return back()->with('message', "$user_email has been funded $amount on $site_name");

        }


        $data['sites'] = Webkey::all();
        return view('process-issues', $data);


    }



}
