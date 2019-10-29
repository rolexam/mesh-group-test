<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        "name" => $faker->word,
        "description" => $faker->text(200),
        "image" => $faker->imageUrl(640, 480),
        "direction_id" => \App\Direction::inRandomOrder()->first()->id
    ];
});
