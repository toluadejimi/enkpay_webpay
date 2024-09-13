<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WovenController extends Controller
{
    public function get_account(request $request)
    {

        $set = Setting::where('id', 1)->first();
        if ($set->woven == 1) {
            $faker = Factory::create();
            if($request->amount > 10000){
                $data['pamount'] = $request->amount + 200;
            }else{
                $data['pamount'] = $request->amount + 100;
            }

            $first_name = User::inRandomOrder()->first()->first_name;
            $last_name = User::inRandomOrder()->first()->last_name;
            $tremail = $faker->email;
            $phone = User::inRandomOrder()->first()->phone;
            $amtt = $data['pamount'];
            $woven_details = woven_create($amtt, $first_name, $last_name, $tremail, $phone);
            return response()->json([
                'account_no' => $woven_details['account_no'],
                'account_name' => $woven_details['account_name'],
                'bank_name' => $woven_details['bank_name'],
            ]);


        }


    }
}
