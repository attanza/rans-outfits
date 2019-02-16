<?php

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::truncate();
        $categories = ["Outer", "Blouse", "Pants"];
        for ($i = 0; $i < count($categories); $i++) {
            ProductCategory::create([
                'name' => $categories[$i]
            ]);
        }

    }
}
