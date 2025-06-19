<?php

namespace Database\Seeders;

use App\Models\EventReservation;
use App\Models\EventPackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = EventPackage::all();
        
        $reservations = [
            [
                'customer_name' => 'John & Sarah Wilson',
                'package_name' => 'Wedding Bliss Package',
                'event_date' => '2024-12-15',
                'notes' => 'Please ensure vegetarian options are available for 20 guests',
                'total_price' => 8500.00,
                'status' => 'confirmed'
            ],
            [
                'customer_name' => 'TechCorp Solutions',
                'package_name' => 'Corporate Meeting Package',
                'event_date' => '2024-11-20',
                'notes' => 'Need projector and whiteboard for presentations',
                'total_price' => 2500.00,
                'status' => 'confirmed'
            ],
            [
                'customer_name' => 'Emma Rodriguez',
                'package_name' => 'Birthday Celebration Package',
                'event_date' => '2024-12-08',
                'notes' => 'Birthday cake for Emma, age 25',
                'total_price' => 3500.00,
                'status' => 'pending'
            ],
            [
                'customer_name' => 'Michael & Lisa Chen',
                'package_name' => 'Intimate Dinner Package',
                'event_date' => '2024-11-30',
                'notes' => 'Anniversary celebration - please add rose petals decoration',
                'total_price' => 1800.00,
                'status' => 'confirmed'
            ],
            [
                'customer_name' => 'David & Maria Santos',
                'package_name' => 'Beach Wedding Package',
                'event_date' => '2025-01-15',
                'notes' => 'Beach ceremony at sunset, reception to follow',
                'total_price' => 12000.00,
                'status' => 'confirmed'
            ],
            [
                'customer_name' => 'Global Marketing Inc.',
                'package_name' => 'Rooftop Party Package',
                'event_date' => '2024-12-31',
                'notes' => 'New Year celebration with countdown',
                'total_price' => 6000.00,
                'status' => 'pending'
            ],
            [
                'customer_name' => 'Robert Johnson',
                'package_name' => 'Corporate Meeting Package',
                'event_date' => '2024-11-25',
                'notes' => 'Board meeting setup with name cards',
                'total_price' => 2500.00,
                'status' => 'cancelled'
            ],
            [
                'customer_name' => 'Sophie & Alex Thompson',
                'package_name' => 'Wedding Bliss Package',
                'event_date' => '2025-02-14',
                'notes' => 'Valentine\'s Day wedding theme',
                'total_price' => 8500.00,
                'status' => 'pending'
            ],
            [
                'customer_name' => 'Creative Design Studio',
                'package_name' => 'Rooftop Party Package',
                'event_date' => '2024-12-20',
                'notes' => 'Holiday party for 50 employees',
                'total_price' => 6000.00,
                'status' => 'confirmed'
            ],
            [
                'customer_name' => 'James & Amanda Davis',
                'package_name' => 'Intimate Dinner Package',
                'event_date' => '2024-12-24',
                'notes' => 'Christmas Eve dinner with festive decorations',
                'total_price' => 1800.00,
                'status' => 'confirmed'
            ]
        ];

        foreach ($reservations as $reservation) {
            $package = $packages->where('name', $reservation['package_name'])->first();
            
            if ($package) {
                EventReservation::create([
                    'customer_name' => $reservation['customer_name'],
                    'event_package_id' => $package->id,
                    'event_date' => $reservation['event_date'],
                    'notes' => $reservation['notes'],
                    'total_price' => $reservation['total_price'],
                    'status' => $reservation['status']
                ]);
            }
        }
    }
}
