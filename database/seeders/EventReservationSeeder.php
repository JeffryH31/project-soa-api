<?php

namespace Database\Seeders;

use App\Models\EventReservation;
use App\Models\EventSpace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grandBallroom = EventSpace::where('name', 'Grand Ballroom')->first();
        $gardenTerrace = EventSpace::where('name', 'Garden Terrace')->first();
        $execMeetingRoom = EventSpace::where('name', 'Executive Meeting Room')->first();
        $rooftopLounge = EventSpace::where('name', 'Rooftop Lounge')->first();
        $beachfrontPavilion = EventSpace::where('name', 'Beachfront Pavilion')->first();
        $intimateDiningRoom = EventSpace::where('name', 'Intimate Dining Room')->first();

        if (!$grandBallroom || !$gardenTerrace || !$execMeetingRoom || !$rooftopLounge || !$beachfrontPavilion || !$intimateDiningRoom) {
            $this->command->error('One or more event spaces are not found. Please run the EventSpaceSeeder first.');
            return;
        }

        $reservations = [
            [
                'customer_name' => 'John & Sarah Wilson',
                'start_date' => '2024-12-15',
                'end_date' => '2024-12-15',
                'pax' => rand(50, 100),
                'notes' => 'Please ensure vegetarian options are available for 20 guests',
                'total_price' => 8500.00,
                'status' => 'paid',
                'event_space_id' => $grandBallroom->id,
            ],
            [
                'customer_name' => 'TechCorp Solutions',
                'start_date' => '2024-11-20',
                'end_date' => '2024-11-20',
                'pax' => rand(50, 100),
                'notes' => 'Need projector and whiteboard for presentations',
                'total_price' => 2500.00,
                'status' => 'paid',
                'event_space_id' => $execMeetingRoom->id,
            ],
            [
                'customer_name' => 'Emma Rodriguez',
                'start_date' => '2024-12-08',
                'end_date' => '2024-12-08',
                'pax' => rand(50, 100),
                'notes' => 'Birthday cake for Emma, age 25',
                'total_price' => 3500.00,
                'status' => 'pending',
                'event_space_id' => $rooftopLounge->id,
            ],
            [
                'customer_name' => 'Michael & Lisa Chen',
                'start_date' => '2024-11-30',
                'end_date' => '2024-11-30',
                'pax' => rand(50, 100),
                'notes' => 'Anniversary celebration - please add rose petals decoration',
                'total_price' => 1800.00,
                'status' => 'paid',
                'event_space_id' => $intimateDiningRoom->id,
            ],
            [
                'customer_name' => 'David & Maria Santos',
                'start_date' => '2025-01-15',
                'end_date' => '2025-01-15',
                'pax' => rand(50, 100),
                'notes' => 'Beach ceremony at sunset, reception to follow',
                'total_price' => 12000.00,
                'status' => 'paid',
                'event_space_id' => $beachfrontPavilion->id,
            ],
            [
                'customer_name' => 'Global Marketing Inc.',
                'start_date' => '2024-12-31',
                'end_date' => '2024-12-31',
                'pax' => rand(50, 100),
                'notes' => 'New Year celebration with countdown',
                'total_price' => 6000.00,
                'status' => 'pending',
                'event_space_id' => $grandBallroom->id,
            ],
            [
                'customer_name' => 'Robert Johnson',
                'start_date' => '2024-11-25',
                'end_date' => '2024-11-25',
                'pax' => rand(50, 100),
                'notes' => 'Board meeting setup with name cards',
                'total_price' => 2500.00,
                'status' => 'cancelled',
                'event_space_id' => $execMeetingRoom->id,
            ],
            [
                'customer_name' => 'Sophie & Alex Thompson',
                'start_date' => '2025-02-14',
                'end_date' => '2025-02-14',
                'pax' => rand(50, 100),
                'notes' => 'Valentine\'s Day wedding theme',
                'total_price' => 8500.00,
                'status' => 'pending',
                'event_space_id' => $gardenTerrace->id,
            ],
            [
                'customer_name' => 'Creative Design Studio',
                'start_date' => '2024-12-20',
                'end_date' => '2024-12-20',
                'pax' => rand(50, 100),
                'notes' => 'Holiday party for 50 employees',
                'total_price' => 6000.00,
                'status' => 'paid',
                'event_space_id' => $grandBallroom->id,
            ],
            [
                'customer_name' => 'James & Amanda Davis',
                'start_date' => '2024-12-24',
                'end_date' => '2024-12-24',
                'pax' => rand(50, 100),
                'notes' => 'Christmas Eve dinner with festive decorations',
                'total_price' => 1800.00,
                'status' => 'paid',
                'event_space_id' => $intimateDiningRoom->id,
            ]
        ];

        foreach ($reservations as $reservation) {
            EventReservation::create($reservation);
        }
    }
}
