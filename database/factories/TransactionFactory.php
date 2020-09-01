<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {

    return [
        'quantity' => $faker->randomNumber(3),
        'total' => $faker->randomDigitNotNull,
        'status' => $faker->randomElement(['pending', 'success']),
        'proof_of_transaction' => $faker->sentence(1),
        'product_id' => \App\Product::all()->random()->id,
    ];
});
