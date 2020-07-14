<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\category;
use Faker\Generator as Faker;

$factory->define(category::class, function (Faker $faker) {
    return [
        'name' => $faker->words($nb = 3, $asText = true),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'img' => Str::random(10),
    ];
});
