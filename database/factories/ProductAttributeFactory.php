<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\ProductAttribute::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'value' => $faker->word,
    ];
});
