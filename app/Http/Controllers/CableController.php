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
}
