<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Product\Attribute;
use App\Models\ProductAttribute;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        DB::table('product_descriptions')->truncate();
        DB::table('product_attributes')->truncate();
        DB::table('product_medias')->truncate();

        $productList = [
            "Bionic Gingham",
            "Ghania Kimono",
            "Naziha",
            "Sabriya ",
            "Shanum",
            "Naura",
            "Ameera",
            "Ayesha",
            "Geulis (batik)",
            "Geulis (batik) Full",
            "Lilis (Batik)",
            "Jasmine",
            "Rania",
            "Shaima Tunic",
            "Dara Tunic",
            "Aliyaa Blazer",
            "Fauziah Stripe",
            "Humaira",
            "Basic Baggy Pants",
            "Hawa",
            "Balqis",
            "Kiara Tunic",
            "Jihan",
            "Khansa",
            "Maya"
        ];

        $colors = ["Red", "Green", "Blue"];
        $sizes = ["S", "M", "L"];

        for ($i = 0; $i < count($productList); $i++) {
            factory(App\Models\Product::class, 1)->create()->each(function ($product) use ($colors) {
                $product->description()->save(factory(App\Models\ProductDescription::class)->make());
                $product->medias()->saveMany(factory(App\Models\ProductMedia::class, 5)->make());
                for ($j = 0; $j < count($colors); $j++) {
                    ProductAttribute::create([
                        'product_id' => $product->id,
                        'name' => 'color',
                        'value' => $colors[$j]
                    ]);
                }
            });

        }


    }
}
