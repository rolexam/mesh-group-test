<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        "name" => $faker->word,
        "description" => $faker->text(200),
        "image" => $faker->image($dir = storage_path('app/public/products'), $width = 640, $height = 480, null, false),
        "direction_id" => \App\Direction::inRandomOrder()->first()->id
    ];
});
