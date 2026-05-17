<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout()
    {
        return view('pages.payment.checkout');
    }

    public function success(Request $request)
    {
        if (auth()->check()) {
            $user = auth()->user();
            
            // Extract parameters
            $title = $request->query('title', 'Blaze of Glory');
            $seats = $request->query('seats', 'G7,G8,G9');
            $price = $request->query('price', 250);
            $bookingDate = date('Y-m-d');
            $showTime = 'Today, 07:15 PM';
            
            // Find movie
            $movie = \App\Models\Movie::where('title', $title)->first();
            if (!$movie) {
                // If not found, let's create a movie record
                $movie = \App\Models\Movie::create([
                    'title' => $title,
                    'description' => 'Great show.',
                    'genre' => 'Entertainment',
                    'duration' => '2h',
                    'language' => 'English',
                    'rating' => '8.0',
                    'poster' => 'poster-1',
                    'release_date' => $bookingDate
                ]);
            }
            
            // Avoid duplicate booking creation on refresh
            $exists = \App\Models\Booking::where([
                'user_name' => $user->name,
                'movie_id' => $movie->id,
                'seat_numbers' => $seats,
                'booking_date' => $bookingDate
            ])->exists();
            
            if (!$exists) {
                \App\Models\Booking::create([
                    'user_name' => $user->name,
                    'movie_id' => $movie->id,
                    'seat_numbers' => $seats,
                    'show_time' => $showTime,
                    'booking_date' => $bookingDate,
                    'total_price' => $price,
                    'payment_status' => 'confirmed'
                ]);
            }
        }
        
        return view('pages.payment.success');
    }

    public function failed()
    {
        return view('pages.payment.failed');
    }
}