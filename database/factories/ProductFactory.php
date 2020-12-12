<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\User;
use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'unique_code' => $faker->randomDigit,
        'quantity' => $faker->randomDigit,
        'category' => $faker->word,
        'status' => $faker->randomElement(array('pending','on progres','sukses')),
        'link_goggle_drive' => $faker->url,
        'total' => $faker->randomNumber(6),
        'user_id' =>  User::all()->random(),

    ];
});
