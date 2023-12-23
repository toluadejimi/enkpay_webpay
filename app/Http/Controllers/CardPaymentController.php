<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CardPaymentController extends Controller
{

    public function pre_pay(request $request)
    {

        $faker = Factory::create();


        $amount = $request->amount;
        $first_name = $faker->name;
        $last_name = $faker->lastName;
        $email = $faker->email;
        $user_id = $request->user_id;
        $pre = pre_pay($amount, $first_name, $last_name, $email, $user_id);

        

        dd($pre);

    }
}
