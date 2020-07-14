<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\news;
use Faker\Generator as Faker;

$factory->define(news::class, function (Faker $faker) {
    return [
        'title' => $faker->words($nb = 3, $asText = true),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'text' => $faker->text,
        'author_name' =>  mt_rand(1,5),
        'img' => Str::random(10),
        'category_id' => mt_rand(1,5),
        'status_id' => mt_rand(1,3),
    ];
});

//
//'user_id' => factory(App\User::class),
//        'img' => Str::random(10),
//        'category_id' => factory(App\category::class),
//        'status_id' => factory(App\status::class),
