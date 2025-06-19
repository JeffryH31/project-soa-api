<?php

namespace Database\Seeders;

use App\Models\EventMenu;
use App\Models\EventReservation;
use App\Models\EventReservationMenu;
use App\Models\DishCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventReservationMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservations = EventReservation::all();
        $categories = DishCategory::all();

        if ($reservations->isEmpty() || $categories->isEmpty()) {
            $this->command->error('Please run EventReservationSeeder and DishCategorySeeder first.');
            return;
        }

        foreach ($reservations as $reservation) {
            foreach ($categories as $category) {
                $menuItem = EventMenu::where('dish_category_id', $category->id)
                    ->inRandomOrder()
                    ->first();

                if ($menuItem) {
                    DB::table('event_reservation_menus')->insert([
                        'event_reservation_id' => $reservation->id,
                        'event_menu_id' => $menuItem->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
