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
            [
                'name' => 'Spring Rolls',
                'description' => 'Fresh vegetables wrapped in rice paper with sweet chili sauce',
                'price' => 8.50,
                'image' => 'images/braised prok belly.png',
                'category_name' => 'Appetizer',
            ],
            [
                'name' => 'Chicken Satay',
                'description' => 'Grilled chicken skewers with peanut sauce',
                'price' => 12.00,
                'image' => 'images/charsiu.png',
                'category_name' => 'Appetizer',
            ],
            [
                'name' => 'Bruschetta',
                'description' => 'Toasted bread topped with tomatoes, garlic, and basil',
                'price' => 9.00,
                'image' => 'images/dumplings.png',
                'category_name' => 'Appetizer',
            ],
            [
                'name' => 'Tom Yum Soup',
                'description' => 'Spicy and sour soup with shrimp and mushrooms',
                'price' => 15.00,
                'image' => 'images/egg fried rice.png',
                'category_name' => 'Soup',
            ],
            [
                'name' => 'Cream of Mushroom',
                'description' => 'Rich and creamy mushroom soup',
                'price' => 10.00,
                'image' => 'images/steamed_buns.png',
                'category_name' => 'Soup',
            ],
            [
                'name' => 'Grilled Salmon',
                'description' => 'Fresh salmon with lemon butter sauce and seasonal vegetables',
                'price' => 28.00,
                'image' => 'images/braised prok belly.png',
                'category_name' => 'Main Course',
            ],
            [
                'name' => 'Beef Tenderloin',
                'description' => 'Premium beef tenderloin with red wine reduction',
                'price' => 35.00,
                'image' => 'images/charsiu.png',
                'category_name' => 'Main Course',
            ],
            [
                'name' => 'Chicken Marsala',
                'description' => 'Pan-seared chicken in marsala wine sauce',
                'price' => 22.00,
                'image' => 'images/dumplings.png',
                'category_name' => 'Main Course',
            ],
            [
                'name' => 'Chocolate Lava Cake',
                'description' => 'Warm chocolate cake with molten center, served with vanilla ice cream',
                'price' => 12.00,
                'image' => 'images/egg fried rice.png',
                'category_name' => 'Dessert',
            ],
            [
                'name' => 'Tiramisu',
                'description' => 'Classic Italian dessert with coffee-flavored mascarpone',
                'price' => 10.00,
                'image' => 'images/steamed_buns.png',
                'category_name' => 'Dessert',
            ],
            [
                'name' => 'Fresh Fruit Punch',
                'description' => 'Refreshing blend of seasonal fruits',
                'price' => 6.00,
                'image' => 'images/braised prok belly.png',
                'category_name' => 'Beverage',
            ],
            [
                'name' => 'Iced Tea',
                'description' => 'Premium black tea served over ice with lemon',
                'price' => 4.50,
                'image' => 'images/charsiu.png',
                'category_name' => 'Beverage',
            ],
            [
                'name' => 'Caesar Salad',
                'description' => 'Romaine lettuce with parmesan cheese and croutons',
                'price' => 11.00,
                'image' => 'images/dumplings.png',
                'category_name' => 'Salad',
            ],
            [
                'name' => 'Greek Salad',
                'description' => 'Mixed greens with feta cheese, olives, and cucumber',
                'price' => 13.00,
                'image' => 'images/egg fried rice.png',
                'category_name' => 'Salad',
            ],
            [
                'name' => 'Fried Rice',
                'description' => 'Stir-fried rice with vegetables and choice of protein',
                'price' => 14.00,
                'image' => 'images/steamed_buns.png',
                'category_name' => 'Rice & Noodles',
            ],
            [
                'name' => 'Pad Thai',
                'description' => 'Stir-fried rice noodles with eggs, tofu, and peanuts',
                'price' => 16.00,
                'image' => 'images/braised prok belly.png',
                'category_name' => 'Rice & Noodles',
            ],
            [
                'name' => 'Grilled Prawns',
                'description' => 'Jumbo prawns grilled to perfection with garlic butter',
                'price' => 32.00,
                'image' => 'images/charsiu.png',
                'category_name' => 'Seafood',
            ],
            [
                'name' => 'Fish & Chips',
                'description' => 'Beer-battered cod with crispy fries',
                'price' => 18.00,
                'image' => 'images/dumplings.png',
                'category_name' => 'Seafood',
            ],
        ];

        foreach ($menus as $menu) {
            $category = $categories->where('name', $menu['category_name'])->first();
            if ($category) {
                EventMenu::create([
                    'name' => $menu['name'],
                    'description' => $menu['description'],
                    'price' => $menu['price'],
                    'image' => $menu['image'],
                    'dish_category_id' => $category->id,
                ]);
            }
        }
    }
}
