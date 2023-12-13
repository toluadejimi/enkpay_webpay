<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CardPaymentController extends Controller
{

    public function pre_pay(request $request)
    {


        function tokenkey()
        {

            $databody = array(
                'clientId' => env('PELPAYCLIENTID'),
                'clientSecret' => env('PELPAYCLIENTSECRET'),

            );


            $post_data = json_encode($databody);


            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.pelpay.ng/api/Account/login',
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
            return $var->access_token;
        }



        function trx()
        {

            $refcode = "CARD" . random_int(100, 999) . date('YmdHis');


            return $refcode;
        }




        $token = tokenkey();

        $databody = array(

            "amount" => $request->amount ?? 200,
            "currency" =>  "str",
            "merchantRef" => "2299f1b2-bd4a-4631-a12b-3aa780288ca9",
            "narration" =>  "Card Payment",
            "callBackUrl" => "https://enkpayapp.enkwave.com/api/v1/cash-out-webhook",
            "splitCode" => "",
            "shouldTokenizeCard" => true,

            "customer" => array(
                "customerId" => random_int(00, 99),
                "customerLastName" => "Tolulope",
                "customerFirstName" => "Adejimi",
                "customerEmail" => $request->email ?? "test@email.com",
                "customerPhoneNumber" => "",
                "customerAddress" => "",
                "customerCity" => "",
                "customerStateCode" => "",
                "customerPostalCode" => "",
                "customerCountryCode"  => "NG"
            ),

            "integrationKey" => "69130e11-01a1-4637-adbf-57e88076e9b2",
            "mcc" => 0,
            "merchantDescriptor" =>  "string"

        );


        $post_data = json_encode($databody);



        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.pelpay.ng/payment/advice',
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


        dd($var, $databody);
    }
}
