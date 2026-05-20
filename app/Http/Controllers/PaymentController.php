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
            $foodItems = $request->query('food_items', '');
            $foodPrice = (float)$request->query('food_price', 0);
            if ($foodPrice > 0 && $foodItems) {
                $showTime .= '|' . $foodItems . '|' . $foodPrice;
            }
            
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

                // Deduct used wallet balance
                $walletUsed = (float)$request->query('wallet_used', 0);
                if ($walletUsed > 0) {
                    $user->decrement('wallet_balance', $walletUsed);
                }

                // Increment user's wallet balance by 100.00 Rs on successful booking
                $user->increment('wallet_balance', 100.00);
            }
        }
        
        return view('pages.payment.success');
    }

    public function failed()
    {
        return view('pages.payment.failed');
    }
}