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
                'price' => 5000000,
            ],
            [
                'name' => 'Live Band',
                'price' => 8000000,
            ],
            [
                'name' => 'DJ Services',
                'price' => 3500000,
            ],
            [
                'name' => 'Flower Decoration',
                'price' => 4000000,
            ],
            [
                'name' => 'Balloon Decoration',
                'price' => 1500000,
            ],
            [
                'name' => 'Wedding Cake',
                'price' => 2000000,
            ],
            [
                'name' => 'Champagne Service',
                'price' => 750000,
            ],
            [
                'name' => 'Coffee & Tea Service',
                'price' => 50000,
            ],
            [
                'name' => 'Ice Cream Bar',
                'price' => 45000,
            ],
            [
                'name' => 'Candy Buffet',
                'price' => 40000,
            ],
            [
                'name' => 'Photo Booth',
                'price' => 3000000,
            ],
            [
                'name' => 'Videography',
                'price' => 6500000,
            ],
            [
                'name' => 'Wedding Coordinator',
                'price' => 5000000,
            ],
            [
                'name' => 'Limo Service',
                'price' => 2500000,
            ],
            [
                'name' => 'Guest Book',
                'price' => 300000,
            ]
        ];

        foreach ($addOns as $addOn) {
            EventAddOn::create($addOn);
        }
    }
}
