<?php

use Illuminate\Database\Seeder;
use App\Models\ProductShipping;

class ProductShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductShipping::truncate();

    }
}
