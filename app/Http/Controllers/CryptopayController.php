<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class CryptopayController extends Controller
{


    public function crypto_pay(request $request){

        // $token = crypto_token();

        $token = crypto_currency();

        dd($token);

    }


    public function crypto_pay_view(request $request){



        $set = Setting::where('id', 1)->first();
        if($set->pay_by_crypto == 1){


            $rate = get_rate();
            $data['curr'] = crypto_currency();
            $data['webhook'] = $request->webhook;
            $data['key'] = $request->key;
            $data['order_id'] = $request->order_id;
    
            $data['amount_in_usd'] = $request->amount / $rate;
            return view('crypto', $data);

        }
   

    }


    public function crypto_pay_price(request $request){


        $set = Setting::where('id', 1)->first();
        if($set->pay_by_crypto == 1){


        $to_curr = $request->curr;
        $price = get_min($to_curr);

        if($request->amount < $price){
            return back()->with('error', "Minimum amount can not be less than $".number_format($price, 2));
        }

        $code = $to_curr;
        $amount = $request->amount;
        $cypto_amount = estimate($amount, $code);
        $order_id = $request->order_id;
        $order_description = $request->order_description;

        //$pay = create_payment($amount, $code, $order_id, $order_description);

        $data['amount_in_usd'] = $request->amount;
        $data['crypto_amount'] = $cypto_amount;
        $data['name'] = $request->curr;
        $data['image'] = "https://nowpayments.io".$request->image;


        // $data['payment_status'] = $pay['payment_status'];
        // $data['pay_address'] = $pay['pay_address'];
        $data['crypto_amount'] = $cypto_amount;
        $data['crypto_amount'] = $cypto_amount;
        $data['crypto_amount'] = $cypto_amount;

        return view('crypto-price', $data);

        }

        




       
    }


   



}
