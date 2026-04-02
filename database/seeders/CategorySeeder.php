<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::updateOrCreate(['name' => 'Dessert']);
        Category::updateOrCreate(['name' => 'Pastry']);
        Category::updateOrCreate(['name' => 'Breakfast']);
        Category::updateOrCreate(['name' => 'Cake']);
        Category::updateOrCreate(['name' => 'Ice Cream']);
    }
}
