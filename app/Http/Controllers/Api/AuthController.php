<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\OauthAccessToken;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{


    public function get_token(request $request){


        $email = $request->email;
        $credentials = request(['email', 'password']);



        if (!auth()->attempt($credentials)) {
            return response()->json([
                'status' => false,
                'message' => 'Email or Password Incorrect'
            ], 401);
        }


        $get_token = OauthAccessToken::where('user_id', Auth::id())->first()->user_id ?? null;

       // dd($get_token, Auth::user());

        if($get_token != null){
            OauthAccessToken::where('user_id', Auth::id())->delete();
        }

        $token = auth()->user()->createToken('API Token')->accessToken;

        return response()->json([
                'status' => true,
                'Authorization' => $token
        ], 200);




    }




}
