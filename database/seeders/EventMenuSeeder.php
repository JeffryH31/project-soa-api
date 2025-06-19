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

        $menuItems = [
            [
                'image' => 'event/menu/Mongolian beef.png',
                'name' => 'Mongolian beef',
                'description' => 'Delicious stir-fried beef in a savory Mongolian sauce, served with vegetables.',
                'price' => 480000,
                'dish_category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'event/menu/Baijiu.png',
                'name' => 'Baijiu',
                'description' => 'Strong traditional Chinese liquor with a bold, fiery finish.',
                'price' => 380000,
                'dish_category_id' => DishCategory::where('name', 'Wine')->first()->id,
            ],
            [
                'image' => 'event/menu/Bao Buns.png',
                'name' => 'Bao Buns',
                'description' => 'Soft steamed buns filled with savory meat and fresh veggies.',
                'price' => 250000,
                'dish_category_id' => DishCategory::where('name', 'Appetizer')->first()->id,
            ],
            [
                'image' => 'event/menu/Braised Pork Belly.png',
                'name' => 'Braised Pork Belly',
                'description' => 'Tender pork belly slow-cooked in a rich, sweet, soy-based sauce.',
                'price' => 495000,
                'dish_category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'event/menu/Cabernet Franc.png',
                'name' => 'Cabernet Franc',
                'description' => 'Elegant red wine with soft tannins and a hint of spice.',
                'price' => 650000,
                'dish_category_id' => DishCategory::where('name', 'Wine')->first()->id,
            ],
            [
                'image' => 'event/menu/Charsiu Chicken.png',
                'name' => 'Charsiu Chicken',
                'description' => 'Roasted chicken glazed with sweet and savory char siu sauce.',
                'price' => 450000,
                'dish_category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'event/menu/Cheong Fun.png',
                'name' => 'Cheong Fun',
                'description' => 'Silky rice noodle rolls filled with delectable shrimp.',
                'price' => 280000,
                'dish_category_id' => DishCategory::where('name', 'Dimsum')->first()->id,
            ],
            [
                'image' => 'event/menu/Chili Oil Wontons.png',
                'name' => 'Chili Oil Wontons',
                'description' => 'Tender steamed wontons drenched in aromatic chili oil and soy sauce.',
                'price' => 290000,
                'dish_category_id' => DishCategory::where('name', 'Dimsum')->first()->id,
            ],
            [
                'image' => 'event/menu/Oolong Tea.png',
                'name' => 'Oolong Tea',
                'description' => 'Smooth and floral Chinese tea with roasted undertones.',
                'price' => 200000,
                'dish_category_id' => DishCategory::where('name', 'Beverage')->first()->id,
            ],
            [
                'image' => 'event/menu/Chow Mein.png',
                'name' => 'Chow Mein',
                'description' => 'Classic stir-fried noodles with vegetables and meat.',
                'price' => 420000,
                'dish_category_id' => DishCategory::where('name', 'Rice & Noodles')->first()->id,
            ],
            [
                'image' => 'event/menu/Congee.png',
                'name' => 'Congee',
                'description' => 'Warm rice porridge served with savory toppings.',
                'price' => 400000,
                'dish_category_id' => DishCategory::where('name', 'Rice & Noodles')->first()->id,
            ],
            [
                'image' => 'event/menu/Corn Soup.png',
                'name' => 'Corn Soup',
                'description' => 'Creamy sweet corn soup with egg drop and chicken.',
                'price' => 240000,
                'dish_category_id' => DishCategory::where('name', 'Soup')->first()->id,
            ],
            [
                'image' => 'event/menu/Cucumber Salad.png',
                'name' => 'Cucumber Salad',
                'description' => 'Chilled cucumber slices marinated in vinegar, garlic, and a generous dash of chili oil.',
                'price' => 220000,
                'dish_category_id' => DishCategory::where('name', 'Appetizer')->first()->id,
            ],
            [
                'image' => 'event/menu/Dumplings.png',
                'name' => 'Dumplings',
                'description' => 'Steamed or pan-fried dumplings filled with meat and veggies.',
                'price' => 285000,
                'dish_category_id' => DishCategory::where('name', 'Dimsum')->first()->id,
            ],
            [
                'image' => 'event/menu/Egg Fried Rice.png',
                'name' => 'Egg Fried Rice',
                'description' => 'Fragrant fried rice tossed with egg and scallions.',
                'price' => 410000,
                'dish_category_id' => DishCategory::where('name', 'Rice & Noodles')->first()->id,
            ],
            [
                'image' => 'event/menu/Orange Juice.png',
                'name' => 'Orange Juice',
                'description' => 'Freshly squeezed sweet and tangy orange juice.',
                'price' => 210000,
                'dish_category_id' => DishCategory::where('name', 'Beverage')->first()->id,
            ],
            [
                'image' => 'event/menu/Fried Wontons.png',
                'name' => 'Fried Wontons',
                'description' => 'Crispy golden wontons filled with seasoned meat.',
                'price' => 260000,
                'dish_category_id' => DishCategory::where('name', 'Appetizer')->first()->id,
            ],
            [
                'image' => 'event/menu/Fried Mantou.png',
                'name' => 'Fried Mantou',
                'description' => 'Golden fried buns served with sweet condensed milk.',
                'price' => 230000,
                'dish_category_id' => DishCategory::where('name', 'Dessert')->first()->id,
            ],
            [
                'image' => 'event/menu/Hainanese Chicken Rice.png',
                'name' => 'Hainanese Chicken Rice',
                'description' => 'Poached chicken with fragrant rice and garlic-chili sauce.',
                'price' => 485000,
                'dish_category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'event/menu/Herbal Chicken Soup.png',
                'name' => 'Herbal Chicken Soup',
                'description' => 'Healing chicken soup brewed with Chinese herbs.',
                'price' => 270000,
                'dish_category_id' => DishCategory::where('name', 'Soup')->first()->id,
            ],
            [
                'image' => 'event/menu/Hot and Sour Soup.png',
                'name' => 'Hot and Sour Soup',
                'description' => 'Spicy and tangy soup with tofu, mushroom, and bamboo shoots.',
                'price' => 265000,
                'dish_category_id' => DishCategory::where('name', 'Soup')->first()->id,
            ],
            [
                'image' => 'event/menu/Iced Tea.png',
                'name' => 'Iced Tea',
                'description' => 'Chilled black tea served with ice.',
                'price' => 200000,
                'dish_category_id' => DishCategory::where('name', 'Beverage')->first()->id,
            ],
            [
                'image' => 'event/menu/Kungpao Chicken.png',
                'name' => 'Kungpao Chicken',
                'description' => 'Stir-fried chicken with peanuts, dried chilies, and sauce.',
                'price' => 460000,
                'dish_category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'event/menu/Iced Lemon Tea.png',
                'name' => 'Iced Lemon Tea',
                'description' => 'Refreshing lemon-flavored iced tea.',
                'price' => 205000,
                'dish_category_id' => DishCategory::where('name', 'Beverage')->first()->id,
            ],
            [
                'image' => 'event/menu/Lotus Root and Pork Soup.png',
                'name' => 'Lotus Root and Pork Soup',
                'description' => 'Clear broth with pork ribs and sliced lotus root.',
                'price' => 275000,
                'dish_category_id' => DishCategory::where('name', 'Soup')->first()->id,
            ],
            [
                'image' => 'event/menu/Mapo Tofu.png',
                'name' => 'Mapo Tofu',
                'description' => 'Spicy tofu dish cooked with minced meat and Sichuan pepper.',
                'price' => 430000,
                'dish_category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'event/menu/Iced Mint Lemonade.png',
                'name' => 'Iced Mint Lemonade',
                'description' => 'Zesty lemonade blended with cooling mint leaves.',
                'price' => 215000,
                'dish_category_id' => DishCategory::where('name', 'Beverage')->first()->id,
            ],
            [
                'image' => 'event/menu/Poached Pears.png',
                'name' => 'Poached Pears',
                'description' => 'Soft pears poached in sweet herbal syrup.',
                'price' => 240000,
                'dish_category_id' => DishCategory::where('name', 'Dessert')->first()->id,
            ],
            [
                'image' => 'event/menu/Red Bean Paste Sesame Balls.png',
                'name' => 'Red Bean Paste Sesame Balls',
                'description' => 'Crispy sesame balls filled with sweet red bean paste.',
                'price' => 225000,
                'dish_category_id' => DishCategory::where('name', 'Dessert')->first()->id,
            ],
            [
                'image' => 'event/menu/Scallion Pancakes.png',
                'name' => 'Scallion Pancakes',
                'description' => 'Flaky and crispy pancakes with chopped green onions.',
                'price' => 255000,
                'dish_category_id' => DishCategory::where('name', 'Appetizer')->first()->id,
            ],
            [
                'image' => 'event/menu/Shumai.png',
                'name' => 'Shumai',
                'description' => 'Steamed open-top dumplings filled with meat and shrimp.',
                'price' => 295000,
                'dish_category_id' => DishCategory::where('name', 'Dimsum')->first()->id,
            ],
            [
                'image' => 'event/menu/Sichuan Boiled Fish.png',
                'name' => 'Sichuan Boiled Fish',
                'description' => 'Tender fish fillets in spicy Sichuan chili broth.',
                'price' => 500000,
                'dish_category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'event/menu/Spring Rolls.png',
                'name' => 'Spring Rolls',
                'description' => 'Crispy rolls filled with seasoned vegetables.',
                'price' => 245000,
                'dish_category_id' => DishCategory::where('name', 'Appetizer')->first()->id,
            ],
            [
                'image' => 'event/menu/Steamed Buns.png',
                'name' => 'Steamed Buns',
                'description' => 'Pillowy buns with savory pork fillings and a sprinkle of scallions.',
                'price' => 270000,
                'dish_category_id' => DishCategory::where('name', 'Dimsum')->first()->id,
            ],
            [
                'image' => 'event/menu/Steamed Chicken with Mushrooms.png',
                'name' => 'Steamed Chicken with Mushrooms',
                'description' => 'Tender chicken pieces steamed with shiitake mushrooms.',
                'price' => 440000,
                'dish_category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'event/menu/Sweet & Sour Pork.png',
                'name' => 'Sweet & Sour Pork',
                'description' => 'Crispy pork in tangy sweet and sour sauce.',
                'price' => 470000,
                'dish_category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'event/menu/Tofu Pudding.png',
                'name' => 'Tofu Pudding',
                'description' => 'Soft silky tofu dessert with sweet ginger syrup.',
                'price' => 235000,
                'dish_category_id' => DishCategory::where('name', 'Dessert')->first()->id,
            ],
            [
                'image' => 'event/menu/Tomato and Egg Stir-Fry.png',
                'name' => 'Tomato and Egg Stir-Fry',
                'description' => 'Savory stir-fried eggs with juicy tomatoes.',
                'price' => 405000,
                'dish_category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
        ];

        foreach ($menuItems as $item) {
            EventMenu::create($item);
        }
    }
}
