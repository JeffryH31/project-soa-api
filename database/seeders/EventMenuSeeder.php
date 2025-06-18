<?php

namespace Database\Seeders;

use App\Models\EventMenu;
use App\Models\DishCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = DishCategory::all();
        
        $menus = [
            // Appetizers
            [
                'name' => 'Spring Rolls',
                'description' => 'Fresh vegetables wrapped in rice paper with sweet chili sauce',
                'price' => 8.50,
                'category_name' => 'Appetizer',
                'main_ingredient_id' => 'vegetables'
            ],
            [
                'name' => 'Chicken Satay',
                'description' => 'Grilled chicken skewers with peanut sauce',
                'price' => 12.00,
                'category_name' => 'Appetizer',
                'main_ingredient_id' => 'chicken'
            ],
            [
                'name' => 'Bruschetta',
                'description' => 'Toasted bread topped with tomatoes, garlic, and basil',
                'price' => 9.00,
                'category_name' => 'Appetizer',
                'main_ingredient_id' => 'bread'
            ],
            
            // Soups
            [
                'name' => 'Tom Yum Soup',
                'description' => 'Spicy and sour soup with shrimp and mushrooms',
                'price' => 15.00,
                'category_name' => 'Soup',
                'main_ingredient_id' => 'shrimp'
            ],
            [
                'name' => 'Cream of Mushroom',
                'description' => 'Rich and creamy mushroom soup',
                'price' => 10.00,
                'category_name' => 'Soup',
                'main_ingredient_id' => 'mushroom'
            ],
            
            // Main Courses
            [
                'name' => 'Grilled Salmon',
                'description' => 'Fresh salmon with lemon butter sauce and seasonal vegetables',
                'price' => 28.00,
                'category_name' => 'Main Course',
                'main_ingredient_id' => 'salmon'
            ],
            [
                'name' => 'Beef Tenderloin',
                'description' => 'Premium beef tenderloin with red wine reduction',
                'price' => 35.00,
                'category_name' => 'Main Course',
                'main_ingredient_id' => 'beef'
            ],
            [
                'name' => 'Chicken Marsala',
                'description' => 'Pan-seared chicken in marsala wine sauce',
                'price' => 22.00,
                'category_name' => 'Main Course',
                'main_ingredient_id' => 'chicken'
            ],
            
            // Desserts
            [
                'name' => 'Chocolate Lava Cake',
                'description' => 'Warm chocolate cake with molten center, served with vanilla ice cream',
                'price' => 12.00,
                'category_name' => 'Dessert',
                'main_ingredient_id' => 'chocolate'
            ],
            [
                'name' => 'Tiramisu',
                'description' => 'Classic Italian dessert with coffee-flavored mascarpone',
                'price' => 10.00,
                'category_name' => 'Dessert',
                'main_ingredient_id' => 'mascarpone'
            ],
            
            // Beverages
            [
                'name' => 'Fresh Fruit Punch',
                'description' => 'Refreshing blend of seasonal fruits',
                'price' => 6.00,
                'category_name' => 'Beverage',
                'main_ingredient_id' => 'fruits'
            ],
            [
                'name' => 'Iced Tea',
                'description' => 'Premium black tea served over ice with lemon',
                'price' => 4.50,
                'category_name' => 'Beverage',
                'main_ingredient_id' => 'tea'
            ],
            
            // Salads
            [
                'name' => 'Caesar Salad',
                'description' => 'Romaine lettuce with parmesan cheese and croutons',
                'price' => 11.00,
                'category_name' => 'Salad',
                'main_ingredient_id' => 'lettuce'
            ],
            [
                'name' => 'Greek Salad',
                'description' => 'Mixed greens with feta cheese, olives, and cucumber',
                'price' => 13.00,
                'category_name' => 'Salad',
                'main_ingredient_id' => 'feta'
            ],
            
            // Rice & Noodles
            [
                'name' => 'Fried Rice',
                'description' => 'Stir-fried rice with vegetables and choice of protein',
                'price' => 14.00,
                'category_name' => 'Rice & Noodles',
                'main_ingredient_id' => 'rice'
            ],
            [
                'name' => 'Pad Thai',
                'description' => 'Stir-fried rice noodles with eggs, tofu, and peanuts',
                'price' => 16.00,
                'category_name' => 'Rice & Noodles',
                'main_ingredient_id' => 'noodles'
            ],
            
            // Seafood
            [
                'name' => 'Grilled Prawns',
                'description' => 'Jumbo prawns grilled to perfection with garlic butter',
                'price' => 32.00,
                'category_name' => 'Seafood',
                'main_ingredient_id' => 'prawns'
            ],
            [
                'name' => 'Fish & Chips',
                'description' => 'Beer-battered cod with crispy fries',
                'price' => 18.00,
                'category_name' => 'Seafood',
                'main_ingredient_id' => 'cod'
            ]
        ];

        foreach ($menus as $menu) {
            $category = $categories->where('name', $menu['category_name'])->first();
            if ($category) {
                EventMenu::create([
                    'name' => $menu['name'],
                    'description' => $menu['description'],
                    'price' => $menu['price'],
                    'dish_category_id' => $category->id,
                    'main_ingredient_id' => $menu['main_ingredient_id']
                ]);
            }
        }
    }
}
