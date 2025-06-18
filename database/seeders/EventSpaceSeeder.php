<?php

namespace Database\Seeders;

use App\Models\EventSpace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSpaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $spaces = [
            [
                'name' => 'Grand Ballroom',
                'location' => 'Main Building, 1st Floor',
                'capacity' => 500,
                'price' => 5000.00
            ],
            [
                'name' => 'Garden Terrace',
                'location' => 'Outdoor Area, Back Garden',
                'capacity' => 200,
                'price' => 3000.00
            ],
            [
                'name' => 'Executive Meeting Room',
                'location' => 'Business Wing, 2nd Floor',
                'capacity' => 50,
                'price' => 1500.00
            ],
            [
                'name' => 'Rooftop Lounge',
                'location' => 'Penthouse Level',
                'capacity' => 100,
                'price' => 2500.00
            ],
            [
                'name' => 'Beachfront Pavilion',
                'location' => 'Coastal Area',
                'capacity' => 300,
                'price' => 4000.00
            ],
            [
                'name' => 'Intimate Dining Room',
                'location' => 'Private Wing, Ground Floor',
                'capacity' => 30,
                'price' => 800.00
            ]
        ];

        foreach ($spaces as $space) {
            EventSpace::create($space);
        }
    }
}
