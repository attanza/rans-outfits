<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    $name = $faker->name;
    $price = $faker->numberBetween($min = 80000, $max = 120000);
    return [
        'product_category_id' => $faker->numberBetween($min = 1, $max = 3),
        'code' => $faker->ean8,
        'name' => $name,
        'slug' => Str::slug($name),
        'regular_price' => $price,
        'sell_price' => $price - ($price * 0.1),
        'discount' => 5,
        'tax' => 5,
        'stock' => 100,
        'stock_status_id' => 1,
        'material' => $faker->word,
        'is_featured' => $faker->numberBetween($min = 0, $max = 1),
        'is_publish' => $faker->numberBetween($min = 0, $max = 1),
    ];
});
