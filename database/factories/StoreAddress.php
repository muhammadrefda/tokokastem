<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use App\StoreAddress;
use Faker\Generator as Faker;

$factory->define(StoreAddress::class, function (Faker $faker) {
    return [
        'city_id' =>  24,
    ];
});
