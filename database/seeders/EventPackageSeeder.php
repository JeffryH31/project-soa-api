<?php

namespace Database\Seeders;

use App\Models\EventPackage;
use App\Models\EventSpace;
use App\Models\EventMenu;
use App\Models\EventAddOn;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $spaces = EventSpace::all();
        $menus = EventMenu::all();
        $addOns = EventAddOn::all();
        
        $packages = [
            [
                'name' => 'Wedding Bliss Package',
                'description' => 'Complete wedding package with premium space, full catering, and essential services',
                'price' => 8500.00,
                'pax' => 200,
                'space_name' => 'Grand Ballroom',
                'menu_items' => ['Spring Rolls', 'Chicken Satay', 'Grilled Salmon', 'Beef Tenderloin', 'Chocolate Lava Cake', 'Fresh Fruit Punch'],
                'add_ons' => ['Professional Photography', 'Live Band', 'Flower Decoration', 'Wedding Cake']
            ],
            [
                'name' => 'Corporate Meeting Package',
                'description' => 'Professional meeting setup with business catering and presentation equipment',
                'price' => 2500.00,
                'pax' => 40,
                'space_name' => 'Executive Meeting Room',
                'menu_items' => ['Bruschetta', 'Cream of Mushroom', 'Chicken Marsala', 'Caesar Salad', 'Tiramisu', 'Iced Tea'],
                'add_ons' => ['Coffee & Tea Service', 'Wedding Coordinator']
            ],
            [
                'name' => 'Birthday Celebration Package',
                'description' => 'Fun and festive birthday party with entertainment and decorations',
                'price' => 3500.00,
                'pax' => 80,
                'space_name' => 'Garden Terrace',
                'menu_items' => ['Spring Rolls', 'Tom Yum Soup', 'Chicken Marsala', 'Greek Salad', 'Chocolate Lava Cake', 'Fresh Fruit Punch'],
                'add_ons' => ['DJ Services', 'Balloon Decoration', 'Ice Cream Bar', 'Photo Booth']
            ],
            [
                'name' => 'Intimate Dinner Package',
                'description' => 'Romantic dinner for small groups with premium dining experience',
                'price' => 1800.00,
                'pax' => 20,
                'space_name' => 'Intimate Dining Room',
                'menu_items' => ['Chicken Satay', 'Cream of Mushroom', 'Grilled Salmon', 'Caesar Salad', 'Tiramisu', 'Iced Tea'],
                'add_ons' => ['Champagne Service', 'Flower Decoration']
            ],
            [
                'name' => 'Beach Wedding Package',
                'description' => 'Stunning beachfront wedding with tropical atmosphere and seafood menu',
                'price' => 12000.00,
                'pax' => 150,
                'space_name' => 'Beachfront Pavilion',
                'menu_items' => ['Spring Rolls', 'Tom Yum Soup', 'Grilled Prawns', 'Fish & Chips', 'Chocolate Lava Cake', 'Fresh Fruit Punch'],
                'add_ons' => ['Professional Photography', 'Live Band', 'Flower Decoration', 'Wedding Cake', 'Videography']
            ],
            [
                'name' => 'Rooftop Party Package',
                'description' => 'Exclusive rooftop celebration with city views and premium services',
                'price' => 6000.00,
                'pax' => 60,
                'space_name' => 'Rooftop Lounge',
                'menu_items' => ['Bruschetta', 'Cream of Mushroom', 'Beef Tenderloin', 'Greek Salad', 'Tiramisu', 'Fresh Fruit Punch'],
                'add_ons' => ['DJ Services', 'Champagne Service', 'Photo Booth', 'Candy Buffet']
            ]
        ];

        foreach ($packages as $package) {
            $space = $spaces->where('name', $package['space_name'])->first();
            
            if ($space) {
                $eventPackage = EventPackage::create([
                    'name' => $package['name'],
                    'description' => $package['description'],
                    'price' => $package['price'],
                    'pax' => $package['pax'],
                    'event_space_id' => $space->id
                ]);

                // Attach menu items
                foreach ($package['menu_items'] as $menuName) {
                    $menu = $menus->where('name', $menuName)->first();
                    if ($menu) {
                        $eventPackage->eventMenus()->attach($menu->id);
                    }
                }

                // Attach add-ons
                foreach ($package['add_ons'] as $addOnName) {
                    $addOn = $addOns->where('name', $addOnName)->first();
                    if ($addOn) {
                        $eventPackage->eventAddOns()->attach($addOn->id);
                    }
                }
            }
        }
    }
}
