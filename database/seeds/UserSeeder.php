<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            "name" => "Administrator",
            "password" => "password",
            "email" => "administrator@ransoutfits.com"
        ]);
    }
}
