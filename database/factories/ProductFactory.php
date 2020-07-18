<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence(3),
        'description' => $faker->paragraph(1),
        'price' => $faker->randomFloat($maxDecimales = 2, $min = 3, $max = 100),
        'image' => $faker->sentence(1),
        'material' => $faker->sentence(2),
        'stock' => $faker->numberBetween(1, 10),
        'size' => $faker->randomElement(['S','M','L','XL']),
        'status' => $faker->randomElement(['available', 'unavailable']),
        'category' => $faker->randomElement(['mug','tote bag','tas','tshirt','masker']),
    ];
});
