<?php

use App\Categories;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        // SQL Insert
        Categories::insert([
            ['name' => 'Electronics', 'slug' => 'electronics', 'icon' => 'electronics-icon.png', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Apparel', 'slug' => 'apparel', 'icon' => 'apparel-icon.png', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Enterainment', 'slug' => 'enterainment', 'icon' => 'entertainment-icon.png', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Toys', 'slug' => 'toys', 'icon' => 'toys-icon.png', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Food', 'slug' => 'food', 'icon' => 'food-icon.png', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Books', 'slug' => 'books', 'icon' => 'books-icon.png', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Furniture', 'slug' => 'furniture', 'icon' => 'furniture-icon.png', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Stationery', 'slug' => 'stationery', 'icon' => 'stationery-icon.png', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Flowers', 'slug' => 'flowers', 'icon' => 'flowers-icon.png', 'created_at' => $now, 'updated_at' => $now],

        ]);
    }
}
