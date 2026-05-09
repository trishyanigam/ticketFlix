<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::create([

            'title' => 'Blaze of Glory',

            'description' => 'Epic action movie.',

            'genre' => 'Action',

            'duration' => '2h 28m',

            'language' => 'English',

            'rating' => '8.4',

            'poster' => 'poster-1',

            'release_date' => '2026-05-12'
        ]);

        Movie::create([

            'title' => 'Void Runners',

            'description' => 'Sci-fi thriller.',

            'genre' => 'Sci-Fi',

            'duration' => '2h 52m',

            'language' => 'English',

            'rating' => '9.1',

            'poster' => 'poster-2',

            'release_date' => '2026-06-10'
        ]);
    }
}