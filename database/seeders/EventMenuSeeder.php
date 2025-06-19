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
                'image' => 'Mongolian_beef.jpg',
                'name' => 'Mongolian beef',
                'description' => 'Delicious stir-fried beef in a savory Mongolian sauce, served with vegetables.',
                'price' => 48000,
                'category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'Baijiu.png',
                'name' => 'Baijiu',
                'description' => 'Strong traditional Chinese liquor with a bold, fiery finish.',
                'price' => 68000,
                'category_id' => DishCategory::where('name', 'Wine')->first()->id,
            ],
            [
                'image' => 'Bao_buns.png',
                'name' => 'Bao Buns',
                'description' => 'Soft steamed buns filled with savory meat and fresh veggies.',
                'price' => 42000,
                'category_id' => DishCategory::where('name', 'Appetizer')->first()->id,
            ],
            [
                'image' => 'Braised_pork_belly.png',
                'name' => 'Braised Pork Belly',
                'description' => 'Tender pork belly slow-cooked in a rich, sweet, soy-based sauce.',
                'price' => 58000,
                'category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'Cabernet_franc.png',
                'name' => 'Cabernet Franc',
                'description' => 'Elegant red wine with soft tannins and a hint of spice.',
                'price' => 125000,
                'category_id' => DishCategory::where('name', 'Wine')->first()->id,
            ],
            [
                'image' => 'Charsiu_chicken.png',
                'name' => 'Charsiu Chicken',
                'description' => 'Roasted chicken glazed with sweet and savory char siu sauce.',
                'price' => 49000,
                'category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'Cheong_fun.png',
                'name' => 'Cheong Fun',
                'description' => 'Silky rice noodle rolls filled with delectable shrimp.',
                'price' => 39000,
                'category_id' => DishCategory::where('name', 'Dimsum')->first()->id,
            ],
            [
                'image' => 'Chili_oil_wontons.png',
                'name' => 'Chili Oil Wontons',
                'description' => 'Tender steamed wontons drenched in aromatic chili oil and soy sauce.',
                'price' => 45000,
                'category_id' => DishCategory::where('name', 'Dimsum')->first()->id,
            ],
            [
                'image' => 'Oolong_tea.png',
                'name' => 'Oolong Tea',
                'description' => 'Smooth and floral Chinese tea with roasted undertones.',
                'price' => 18000,
                'category_id' => DishCategory::where('name', 'Beverage')->first()->id,
            ],
            [
                'image' => 'Chow_mein.png',
                'name' => 'Chow Mein',
                'description' => 'Classic stir-fried noodles with vegetables and meat.',
                'price' => 52000,
                'category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'Congee.png',
                'name' => 'Congee',
                'description' => 'Warm rice porridge served with savory toppings.',
                'price' => 39000,
                'category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'Corn_soup.png',
                'name' => 'Corn Soup',
                'description' => 'Creamy sweet corn soup with egg drop and chicken.',
                'price' => 35000,
                'category_id' => DishCategory::where('name', 'Soup')->first()->id,
            ],
            [
                'image' => 'Cucumber_salad.png',
                'name' => 'Cucumber Salad',
                'description' => 'Chilled cucumber slices marinated in vinegar, garlic, and a generous dash of chili oil.',
                'price' => 25000,
                'category_id' => DishCategory::where('name', 'Appetizer')->first()->id,
            ],
            [
                'image' => 'Dumplings.png',
                'name' => 'Dumplings',
                'description' => 'Steamed or pan-fried dumplings filled with meat and veggies.',
                'price' => 42000,
                'category_id' => DishCategory::where('name', 'Dimsum')->first()->id,
            ],
            [
                'image' => 'Egg_fried_rice.png',
                'name' => 'Egg Fried Rice',
                'description' => 'Fragrant fried rice tossed with egg and scallions.',
                'price' => 40000,
                'category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'Orange_juice.png',
                'name' => 'Orange Juice',
                'description' => 'Freshly squeezed sweet and tangy orange juice.',
                'price' => 22000,
                'category_id' => DishCategory::where('name', 'Beverage')->first()->id,
            ],
            [
                'image' => 'Fried_wontons.png',
                'name' => 'Fried Wontons',
                'description' => 'Crispy golden wontons filled with seasoned meat.',
                'price' => 38000,
                'category_id' => DishCategory::where('name', 'Appetizer')->first()->id,
            ],
            [
                'image' => 'Fried_mantou_with_condensed_milk.png',
                'name' => 'Fried Mantou',
                'description' => 'Golden fried buns served with sweet condensed milk.',
                'price' => 36000,
                'category_id' => DishCategory::where('name', 'Dessert')->first()->id,
            ],
            [
                'image' => 'Hainanese_chicken_rice.png',
                'name' => 'Hainanese Chicken Rice',
                'description' => 'Poached chicken with fragrant rice and garlic-chili sauce.',
                'price' => 54000,
                'category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'Herbal_chicken_soup.png',
                'name' => 'Herbal Chicken Soup',
                'description' => 'Healing chicken soup brewed with Chinese herbs.',
                'price' => 42000,
                'category_id' => DishCategory::where('name', 'Soup')->first()->id,
            ],
            [
                'image' => 'Hot_and_sour_soup.png',
                'name' => 'Hot and Sour Soup',
                'description' => 'Spicy and tangy soup with tofu, mushroom, and bamboo shoots.',
                'price' => 38000,
                'category_id' => DishCategory::where('name', 'Soup')->first()->id,
            ],
            [
                'image' => 'Iced_tea.png',
                'name' => 'Iced Tea',
                'description' => 'Chilled black tea served with ice.',
                'price' => 15000,
                'category_id' => DishCategory::where('name', 'Beverage')->first()->id,
            ],
            [
                'image' => 'Kungpao_chicken.png',
                'name' => 'Kungpao Chicken',
                'description' => 'Stir-fried chicken with peanuts, dried chilies, and sauce.',
                'price' => 52000,
                'category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'Iced_lemon_tea.png',
                'name' => 'Iced Lemon Tea',
                'description' => 'Refreshing lemon-flavored iced tea.',
                'price' => 17000,
                'category_id' => DishCategory::where('name', 'Beverage')->first()->id,
            ],
            [
                'image' => 'Lotus_root_and_pork_soup.png',
                'name' => 'Lotus Root and Pork Soup',
                'description' => 'Clear broth with pork ribs and sliced lotus root.',
                'price' => 44000,
                'category_id' => DishCategory::where('name', 'Soup')->first()->id,
            ],
            [
                'image' => 'Mapo_tofu.png',
                'name' => 'Mapo Tofu',
                'description' => 'Spicy tofu dish cooked with minced meat and Sichuan pepper.',
                'price' => 46000,
                'category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'Iced_mint_lemonade.png',
                'name' => 'Iced Mint Lemonade',
                'description' => 'Zesty lemonade blended with cooling mint leaves.',
                'price' => 18000,
                'category_id' => DishCategory::where('name', 'Beverage')->first()->id,
            ],
            [
                'image' => 'Poached_pears.png',
                'name' => 'Poached Pears',
                'description' => 'Soft pears poached in sweet herbal syrup.',
                'price' => 35000,
                'category_id' => DishCategory::where('name', 'Dessert')->first()->id,
            ],
            [
                'image' => 'Red_bean_paste_sesame_balls.png',
                'name' => 'Red Bean Paste Sesame Balls',
                'description' => 'Crispy sesame balls filled with sweet red bean paste.',
                'price' => 30000,
                'category_id' => DishCategory::where('name', 'Dessert')->first()->id,
            ],
            [
                'image' => 'Scallion_pancakes.png',
                'name' => 'Scallion Pancakes',
                'description' => 'Flaky and crispy pancakes with chopped green onions.',
                'price' => 34000,
                'category_id' => DishCategory::where('name', 'Appetizer')->first()->id,
            ],
            [
                'image' => 'Shumai.png',
                'name' => 'Shumai',
                'description' => 'Steamed open-top dumplings filled with meat and shrimp.',
                'price' => 40000,
                'category_id' => DishCategory::where('name', 'Dimsum')->first()->id,
            ],
            [
                'image' => 'Sichuan_boiled_fish.png',
                'name' => 'Sichuan Boiled Fish',
                'description' => 'Tender fish fillets in spicy Sichuan chili broth.',
                'price' => 59000,
                'category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'Spring_rolls.png',
                'name' => 'Spring Rolls',
                'description' => 'Crispy rolls filled with seasoned vegetables.',
                'price' => 32000,
                'category_id' => DishCategory::where('name', 'Appetizer')->first()->id,
            ],
            [
                'image' => 'Steamed_buns.png',
                'name' => 'Steamed Buns',
                'description' => 'Pillowy buns with savory pork fillings and a sprinkle of scallions.',
                'price' => 35000,
                'category_id' => DishCategory::where('name', 'Dimsum')->first()->id,
            ],
            [
                'image' => 'Steamed_chicken_with_mushrooms.png',
                'name' => 'Steamed Chicken with Mushrooms',
                'description' => 'Tender chicken pieces steamed with shiitake mushrooms.',
                'price' => 47000,
                'category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'Sweet_and_sour_pork.png',
                'name' => 'Sweet & Sour Pork',
                'description' => 'Crispy pork in tangy sweet and sour sauce.',
                'price' => 50000,
                'category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
            [
                'image' => 'Tofu_pudding.png',
                'name' => 'Tofu Pudding',
                'description' => 'Soft silky tofu dessert with sweet ginger syrup.',
                'price' => 30000,
                'category_id' => DishCategory::where('name', 'Dessert')->first()->id,
            ],
            [
                'image' => 'Tomato_and_egg_stir_fry.png',
                'name' => 'Tomato and Egg Stir-Fry',
                'description' => 'Savory stir-fried eggs with juicy tomatoes.',
                'price' => 39000,
                'category_id' => DishCategory::where('name', 'Main Course')->first()->id,
            ],
        ];

        foreach ($menuItems as $item) {
            EventMenu::create($item);
        }
    }
}
