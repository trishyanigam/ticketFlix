<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([

            'title' => 'Neon Music Fest',

            'description' => 'Biggest EDM music festival.',

            'location' => 'Mumbai',

            'event_date' => '2026-05-12',

            'event_time' => '18:00:00',

            'banner' => 'concert-banner',

            'category' => 'Concert',

            'price' => 2499
        ]);

        Event::create([

            'title' => 'Comedy Nights',

            'description' => 'Stand-up comedy event.',

            'location' => 'Chandigarh',

            'event_date' => '2026-05-18',

            'event_time' => '20:00:00',

            'banner' => 'comedy-banner',

            'category' => 'Comedy',

            'price' => 999
        ]);
    }
}