<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CableController extends Controller
{
    public function get_cable_plan()
    {

        try {

            $client = new \GuzzleHttp\Client();
            $request = $client->get('https://vtpass.com/api/service-variations?serviceID=dstv');
            $response = $request->getBody();
            $result = json_decode($response);
            $dstv = $result->content->variations;

            $client = new \GuzzleHttp\Client();
            $request = $client->get('https://vtpass.com/api/service-variations?serviceID=gotv');
            $response = $request->getBody();
            $result = json_decode($response);
            $gotv = $result->content->variations;

            $client = new \GuzzleHttp\Client();
            $request = $client->get('https://vtpass.com/api/service-variations?serviceID=startimes');
            $response = $request->getBody();
            $result = json_decode($response);
            $startimes = $result->content->variations;

            $client = new \GuzzleHttp\Client();
            $request = $client->get('https://vtpass.com/api/service-variations?serviceID=showmax');
            $response = $request->getBody();
            $result = json_decode($response);
            $showmax = $result->content->variations;

            return response()->json([
                'status' => true,
                'dstv' => $dstv,
                'gotv' => $gotv,
                'startimes' => $startimes,
                'showmax' => $showmax,
            ], 200);

        } catch (\Exception$th) {
            return $th->getMessage();
        }

    }


    public function validate_cable(request $request)
    {

        try {

            $auth = env('VTAUTH');
            $api_key = env('APIKEY');
            $po_key = env('PKKEY');
            $sk_key = env('SKKEY');

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api-service.vtpass.com/api/merchant-verify',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'serviceID' => $request->serviceid,
                    'billersCode' => $request->biller_code,
                ),
                CURLOPT_HTTPHEADER => array(
                    //"Authorization: Basic $auth=",
                    "api-key: $api_key",
                    "secret-key: $sk_key",
                    'Cookie: laravel_session=eyJpdiI6IlBkTGc5emRPMmhyQVwvb096YkVKV2RnPT0iLCJ2YWx1ZSI6IkNvSytPVTV5TW52K2tBRlp1R2pqaUpnRDk5YnFRbEhuTHhaNktFcnBhMFRHTlNzRWIrejJxT05kM1wvM1hEYktPT2JKT2dJWHQzdFVaYnZrRytwZ2NmQT09IiwibWFjIjoiZWM5ZjI3NzBmZTBmOTZmZDg3ZTUxMDBjODYxMzQ3OTkxN2M4YTAxNjNmMWY2YjAxZTIzNmNmNWNhOWExNzJmOCJ9',
                ),
            ));

            $var = curl_exec($curl);
            curl_close($curl);
            $var = json_decode($var);

            dd($var);



            return response()->json([


            ], 200);

        } catch (\Exception$th) {
            return $th->getMessage();
        }

    }

}
