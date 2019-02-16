<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AttributeSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductDescriptionSeeder::class);
        $this->call(ProductMediaSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductShippingSeeder::class);
        $this->call(StockStatusSeeder::class);

    }
}
