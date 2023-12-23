<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\TopupCountry;
use Illuminate\Http\Request;
use App\Models\OauthAccessToken;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AirtimeController extends Controller
{
    public function get_country()
    {


        $country = TopupCountry::select('name', 'code')->get();
        return response()->json([

            'status' => true,
            'countries' => $country,

        ]);
    }



    public function get_service(request $request)
    {


        if($request->country_code == null){
            return response()->json([
                'status' => false,
                'message' => "No country code passed",
            ], 422);
        }


        if ($request->code == 'NG') {

            $service = Service::select('operator_id','name')->get();

            if($service->status == 'true' ){
                return response()->json([
                    'status' => true,
                    'data' => $service,
                ], 200);

            }else{

                return response()->json([
                    'status' => false,
                    'data' => "No service available",
                ], 422);

            }



        }else{

            $code = $request->country_code;
            $service = get_services($code);

            if($service != null){

                return response()->json([
                    'status' => true,
                    'data' => $service,
                ], 200);

            }else{

                  return response()->json([
                    'status' => false,
                    'data' => "No service available",
                ], 422);


            }




        }






    }



    public function get_service_cost(request $request)
    {

        if($request->operator_id == null){
            return response()->json([
                'status' => false,
                'message' => "No Service passed",
            ], 422);
        }


        if ($request->country_code == 'NG') {

            $service = Service::select('operator_id','name')->get();

            if($service->status == 'true' ){
                return response()->json([
                    'status' => true,
                    'data' => $service,
                ], 200);


        }else{

                return response()->json([
                    'status' => false,
                    'data' => "No service available",
                ], 422);

            }



        }else{

            $operator_id = $request->operator_id;
            $service = get_services_cost($operator_id);

            if($service != null){

                return response()->json([
                    'status' => true,
                    'data' => $service,
                ], 200);

            }else{

                  return response()->json([
                    'status' => false,
                    'data' => "No service available",
                ], 422);


            }




        }






    }



    public function buy_airtime(request $request){

        $country_code = $request->country_code;
        $service_id = $request->service_id;
        $service_amount = $request->amount;
        $phone = $request->phone;
        $product_id = $request->product_id;
        $rate = $request->rate;


        $operator_id = $request->operator_id;
        $ramount = $rate * $service_amount + 100;


        $amount = $request->amount;


        $balance = check_balance($ramount);

        if($balance == false){

            return response()->json([
                'status' => false,
                'code' => "100004",
                'message' => "Insufficient Funds, Please fund your wallet",
                'balance' => number_format(Auth::user()->main_wallet, 2),

            ], 422);

        }


        if($request->country_code == "NG"){


        }else{



            $charge = charge_wallet($amount);
            $main = User::where('id', Auth::id())->first()->main_wallet;

            $updated_amount = $main - $ramount;

            $ref = refrence_code();

            if($charge == true){

                $purchase = buy_airtime($country_code, $service_id, $amount, $phone,$product_id,$rate,$operator_id);

                if($purchase['status'] == true ){

                //update Transactions
                $trasnaction = new Transaction();
                $trasnaction->user_id = Auth::id();
                $trasnaction->ref_trans_id = $ref;
                $trasnaction->e_ref = $purchase['transactionId'];
                $trasnaction->transaction_type = "FAIRTIME";
                $trasnaction->e_charges = 100;
                $trasnaction->title = "FOREIGN AIRTIME";
                $trasnaction->note = "FOREIGN AIRTIME | $phone ";
                $trasnaction->amount = $amount;
                $trasnaction->debit = $ramount;
                $trasnaction->balance = $updated_amount;
                $trasnaction->status = 1;
                $trasnaction->save();

                return response()->json([
                    'status' => true,
                    'message' => "Transaction Successful",
                    'amount' => number_format($ramount, 2),
                    'ref_id' => $ref,

                ], 200);

                }


                return response()->json([
                    'status' => false,
                    'message' => "Service not available at the moment, contact support"

                ], 200);


            }


            // $purchase = buy_airtime();

            // if($status == 'TRANSACTION SUCCESSFUL'){


            //     echo $var;

            // }










        }














    }





}
