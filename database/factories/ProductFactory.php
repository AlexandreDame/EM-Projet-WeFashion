<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder\ProductTableSeeder;

$factory->define(App\Product::class, function (Faker $faker) {
   
    return [
        'title' => $faker->sentence(2),
        'description' => $faker -> paragraph(),
        'price' => $faker->randomNumber(3),
        'reference' => $faker -> word(),
        'code' => $faker -> numberBetween($min = 1, $max = 2),
        'price' => $faker -> numberBetween($min = 10, $max = 100),
        'status' => $faker -> numberBetween($min = 1, $max = 2),
        
    ];
});
