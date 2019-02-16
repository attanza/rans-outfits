<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\ProductDescription::class, function (Faker $faker) {
    return [
        'short_description' => $faker->text,
        'long_description' => $faker->text,
    ];
});
