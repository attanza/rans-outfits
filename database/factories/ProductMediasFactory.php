<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\ProductMedia::class, function (Faker $faker) {
    return [
        'caption' => $faker->sentence,
        'url' => $faker->imageUrl,
        'is_main' => $faker->numberBetween($min = 0, $max = 1),
        'is_publish' => $faker->numberBetween($min = 0, $max = 1),
        'type' => 'image'
    ];
});
