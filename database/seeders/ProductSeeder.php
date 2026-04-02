<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dessert   = Category::where('name', 'Dessert')->first();
        $pastry    = Category::where('name', 'Pastry')->first();
        $breakfast = Category::where('name', 'Breakfast')->first();

        Product::updateOrCreate(
            ['name' => 'Tiramisu'],
            [
                'price' => 2.75,
                'description' => 'Classic Italian dessert with coffee and mascarpone.',
                'category_id' => $dessert->id,
                'stock' => 10,
                'image' => null,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Donut'],
            [
                'price' => 1.50,
                'description' => 'Soft glazed donut.',
                'category_id' => $pastry->id,
                'stock' => 20,
                'image' => null,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Brownie'],
            [
                'price' => 2.00,
                'description' => 'Rich chocolate brownie.',
                'category_id' => $dessert->id,
                'stock' => 15,
                'image' => null,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Pancake'],
            [
                'price' => 3.00,
                'description' => 'Fluffy pancakes with syrup.',
                'category_id' => $breakfast->id,
                'stock' => 12,
                'image' => null,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Ice Cream'],
            [
                'price' => 2.50,
                'description' => 'Vanilla ice cream scoop.',
                'category_id' => $dessert->id,
                'stock' => 25,
                'image' => null,
            ]
        );
    }
}
