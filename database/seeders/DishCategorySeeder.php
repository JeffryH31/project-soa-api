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
            'Beverage',
            'Dimsum',
            'Rice & Noodles',
            'Main Course',
            'Soup',
            'Wine',
            'Dessert',
        ];

        foreach ($categories as $index => $category) {
            DishCategory::create([
                'name' => $category,
            ]);
        }
    }
}
