<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\User;
use Faker\Generator as Faker;

$factory->define(\App\ShippingAddress::class, function (Faker $faker) {
    return [
        'cities_id' => \App\City::all()->random(),
        'courier_code' => \App\Courier::all()->random(),
        'user_id' =>  User::all()->random(),

    ];
});
