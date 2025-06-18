<?php

namespace Database\Seeders;

use App\Models\EventAddOn;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventAddOnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addOns = [
            [
                'name' => 'Professional Photography',
                'price' => 500.00,
                'quantity' => 1
            ],
            [
                'name' => 'Live Band',
                'price' => 800.00,
                'quantity' => 1
            ],
            [
                'name' => 'DJ Services',
                'price' => 400.00,
                'quantity' => 1
            ],
            [
                'name' => 'Flower Decoration',
                'price' => 300.00,
                'quantity' => 1
            ],
            [
                'name' => 'Balloon Decoration',
                'price' => 150.00,
                'quantity' => 1
            ],
            [
                'name' => 'Wedding Cake',
                'price' => 200.00,
                'quantity' => 1
            ],
            [
                'name' => 'Champagne Service',
                'price' => 25.00,
                'quantity' => 50
            ],
            [
                'name' => 'Coffee & Tea Service',
                'price' => 8.00,
                'quantity' => 100
            ],
            [
                'name' => 'Ice Cream Bar',
                'price' => 15.00,
                'quantity' => 50
            ],
            [
                'name' => 'Candy Buffet',
                'price' => 12.00,
                'quantity' => 100
            ],
            [
                'name' => 'Photo Booth',
                'price' => 350.00,
                'quantity' => 1
            ],
            [
                'name' => 'Videography',
                'price' => 600.00,
                'quantity' => 1
            ],
            [
                'name' => 'Wedding Coordinator',
                'price' => 400.00,
                'quantity' => 1
            ],
            [
                'name' => 'Limo Service',
                'price' => 200.00,
                'quantity' => 1
            ],
            [
                'name' => 'Guest Book',
                'price' => 30.00,
                'quantity' => 1
            ]
        ];

        foreach ($addOns as $addOn) {
            EventAddOn::create($addOn);
        }
    }
}
