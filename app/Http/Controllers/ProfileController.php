<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        
        // Fetch actual bookings from the database for the logged-in user
        $bookings = [];
        try {
            $userBookings = \App\Models\Booking::where('user_name', $user->name)
                ->orderBy('id', 'desc')
                ->get();
                
            foreach ($userBookings as $booking) {
                // Determine movie title
                $movieTitle = 'Movie Booking';
                if ($booking->movie_id) {
                    $movie = \App\Models\Movie::find($booking->movie_id);
                    if ($movie) {
                        $movieTitle = $movie->title;
                    }
                }
                
                // Select dynamic emoji icon based on title for high-fidelity aesthetics
                $icon = '🎬';
                $lowerTitle = strtolower($movieTitle);
                if (str_contains($lowerTitle, 'blaze') || str_contains($lowerTitle, 'glory')) {
                    $icon = '🔥';
                } elseif (str_contains($lowerTitle, 'music') || str_contains($lowerTitle, 'resonance') || str_contains($lowerTitle, 'festival')) {
                    $icon = '🎵';
                } elseif (str_contains($lowerTitle, 'void') || str_contains($lowerTitle, 'runner')) {
                    $icon = '🌠';
                } elseif (str_contains($lowerTitle, 'ipl') || str_contains($lowerTitle, 'cricket') || str_contains($lowerTitle, 'csk') || str_contains($lowerTitle, 'mi')) {
                    $icon = '⚽';
                }
                
                $bookings[] = [
                    'title' => $movieTitle,
                    'venue' => 'PVR Phoenix Mall',
                    'datetime' => $booking->show_time ?: $booking->booking_date,
                    'seats' => 'Seats: ' . str_replace(',', ', ', $booking->seat_numbers),
                    'price' => '₹' . number_format($booking->total_price),
                    'status' => ucfirst($booking->payment_status),
                    'status_type' => strtolower($booking->payment_status) == 'confirmed' ? 'confirmed' : (strtolower($booking->payment_status) == 'completed' ? 'completed' : 'cancelled'),
                    'icon' => $icon,
                    'ticket_url' => route('payment.success') . '?title=' . urlencode($movieTitle) . '&seats=' . urlencode($booking->seat_numbers) . '&price=' . $booking->total_price
                ];
            }
        } catch (\Exception $e) {
            // Fallback if table doesn't exist
        }

        return view('pages.profile.dashboard', compact('bookings'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Profile updated successfully!',
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                ]
            ]);
        }

        return redirect()->back()->with('status', 'profile-updated');
    }
}