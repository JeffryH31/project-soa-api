<?php

namespace Database\Seeders;

use App\Models\EventReservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservations = [
            [
                'customer_name' => 'John & Sarah Wilson',
                'event_date' => '2024-12-15',
                'notes' => 'Please ensure vegetarian options are available for 20 guests',
                'total_price' => 8500.00,
                'status' => 'paid'
            ],
            [
                'customer_name' => 'TechCorp Solutions',
                'event_date' => '2024-11-20',
                'notes' => 'Need projector and whiteboard for presentations',
                'total_price' => 2500.00,
                'status' => 'dp2'
            ],
            [
                'customer_name' => 'Emma Rodriguez',
                'event_date' => '2024-12-08',
                'notes' => 'Birthday cake for Emma, age 25',
                'total_price' => 3500.00,
                'status' => 'pending'
            ],
            [
                'customer_name' => 'Michael & Lisa Chen',
                'event_date' => '2024-11-30',
                'notes' => 'Anniversary celebration - please add rose petals decoration',
                'total_price' => 1800.00,
                'status' => 'dp1'
            ],
            [
                'customer_name' => 'David & Maria Santos',
                'event_date' => '2025-01-15',
                'notes' => 'Beach ceremony at sunset, reception to follow',
                'total_price' => 12000.00,
                'status' => 'paid'
            ],
            [
                'customer_name' => 'Global Marketing Inc.',
                'event_date' => '2024-12-31',
                'notes' => 'New Year celebration with countdown',
                'total_price' => 6000.00,
                'status' => 'pending'
            ],
            [
                'customer_name' => 'Robert Johnson',
                'event_date' => '2024-11-25',
                'notes' => 'Board meeting setup with name cards',
                'total_price' => 2500.00,
                'status' => 'cancelled'
            ],
            [
                'customer_name' => 'Sophie & Alex Thompson',
                'event_date' => '2025-02-14',
                'notes' => "Valentine's Day wedding theme",
                'total_price' => 8500.00,
                'status' => 'pending'
            ],
            [
                'customer_name' => 'Creative Design Studio',
                'event_date' => '2024-12-20',
                'notes' => 'Holiday party for 50 employees',
                'total_price' => 6000.00,
                'status' => 'dp2'
            ],
            [
                'customer_name' => 'James & Amanda Davis',
                'event_date' => '2024-12-24',
                'notes' => 'Christmas Eve dinner with festive decorations',
                'total_price' => 1800.00,
                'status' => 'paid'
            ]
        ];

        foreach ($reservations as $reservation) {
            EventReservation::create([
                'id' => Str::uuid(),
                'customer_name' => $reservation['customer_name'],
                'event_date' => $reservation['event_date'],
                'notes' => $reservation['notes'],
                'total_price' => $reservation['total_price'],
                'status' => $reservation['status']
            ]);
        }
    }
}
