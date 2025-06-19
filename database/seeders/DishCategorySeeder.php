<?php

namespace Database\Seeders;

use App\Models\DishCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
    */
    public function run(): void
    {
        $categories = [
            'Appetizer',
            'Soup',
            'Dimsum',
            'Main Course',
            'Dessert',
            'Beverage',
            'Wine',
            'Salad',
            'Rice & Noodles',
            'Seafood',
        ];

        foreach ($categories as $category) {
            DishCategory::create([
                'name' => $category
            ]);
        }
    }
}
