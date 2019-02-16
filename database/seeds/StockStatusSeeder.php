<?php

use Illuminate\Database\Seeder;
use App\Models\StockStatus;

class StockStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StockStatus::truncate();
        $status = ["In stock", "Out of stock", "In back order"];
        for ($i = 0; $i < count($status); $i++) {
            StockStatus::create([
                'name' => $status[$i]
            ]);
        }
    }
}
