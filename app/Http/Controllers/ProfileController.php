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
                
            $movieMeta = [
                'Dhurandhar' => [
                    'image' => 'dhurandhar2.jpg',
                    'poster' => 'poster-6',
                    'emoji' => '🗡️',
                    'formats' => 'IMAX, 2D',
                    'languages' => 'Hindi'
                ],
                'Krishna' => [
                    'image' => 'Krishnavataram_Part_1_The_Heart.jpg',
                    'poster' => 'poster-1',
                    'emoji' => '🕉️',
                    'formats' => '2D, 3D',
                    'languages' => 'English, Hindi, Tamil, Telugu'
                ],
                'Aakhri' => [
                    'image' => 'akhiri_sawaal.jpg',
                    'poster' => 'poster-3',
                    'emoji' => '⚖️',
                    'formats' => '2D',
                    'languages' => 'Hindi'
                ],
                'Michael' => [
                    'image' => 'michael.jpg',
                    'poster' => 'poster-2',
                    'emoji' => '🕶️',
                    'formats' => '2D, IMAX',
                    'languages' => 'Hindi, English'
                ],
                'Project' => [
                    'image' => 'project_hail_marry.jpg',
                    'poster' => 'poster-4',
                    'emoji' => '🚀',
                    'formats' => '2D, IMAX 3D',
                    'languages' => 'English, Hindi, Tamil, Telugu'
                ],
                'Pati' => [
                    'image' => 'pati_patni_aur_wo_do.jpg',
                    'poster' => 'poster-1',
                    'emoji' => '👩‍❤️‍👨',
                    'formats' => '2D',
                    'languages' => 'Hindi'
                ],
                'Top' => [
                    'image' => 'top_cop.jpg',
                    'poster' => 'poster-5',
                    'emoji' => '👮',
                    'formats' => '2D',
                    'languages' => 'Hindi, Punjabi'
                ],
                'Bhooth' => [
                    'image' => 'bhooth_bangla.jpg',
                    'poster' => 'poster-6',
                    'emoji' => '🐈‍⬛',
                    'formats' => '2D',
                    'languages' => 'Hindi'
                ],
                'Chardikala' => [
                    'image' => 'chardikala.jpg',
                    'poster' => 'poster-2',
                    'emoji' => '🌾',
                    'formats' => '2D',
                    'languages' => 'Hindi, Punjabi'
                ],
                'Raja' => [
                    'image' => 'raja_shivaji.jpg',
                    'poster' => 'poster-4',
                    'emoji' => '👑',
                    'formats' => '2D, 4DX',
                    'languages' => 'Marathi, Hindi'
                ],
                'Blaze' => [
                    'image' => '',
                    'poster' => 'poster-1',
                    'emoji' => '🔥',
                    'formats' => '2D',
                    'languages' => 'English'
                ],
                'Void' => [
                    'image' => '',
                    'poster' => 'poster-2',
                    'emoji' => '🌠',
                    'formats' => '2D',
                    'languages' => 'English'
                ]
            ];

            foreach ($userBookings as $booking) {
                // Determine movie title
                $movieTitle = 'Movie Booking';
                $moviePosterAttr = null;
                if ($booking->movie_id) {
                    $movie = \App\Models\Movie::find($booking->movie_id);
                    if ($movie) {
                        $movieTitle = $movie->title;
                        $moviePosterAttr = $movie->poster;
                    }
                }
                
                // Select dynamic emoji and assets based on title for high-fidelity aesthetics
                $meta = [
                    'image' => '',
                    'poster' => $moviePosterAttr ?: 'poster-6',
                    'emoji' => '🎬',
                    'formats' => '2D',
                    'languages' => 'Hindi'
                ];
                
                $lowerTitle = strtolower($movieTitle);
                foreach ($movieMeta as $key => $data) {
                    if (str_contains($lowerTitle, strtolower($key))) {
                        $meta = $data;
                        if ($moviePosterAttr) {
                            $meta['poster'] = $moviePosterAttr;
                        }
                        break;
                    }
                }
                
                $showTimeStr = $booking->show_time;
                $foodItemsStr = '';
                $foodPriceVal = 0;
                if (str_contains($showTimeStr, '|')) {
                    $parts = explode('|', $showTimeStr);
                    $showTimeStr = $parts[0];
                    $foodItemsStr = $parts[1] ?? '';
                    $foodPriceVal = (float)($parts[2] ?? 0);
                }

                $bookings[] = [
                    'title' => $movieTitle,
                    'venue' => 'PVR Phoenix Mall',
                    'datetime' => $showTimeStr ?: $booking->booking_date,
                    'seats' => 'Seats: ' . str_replace(',', ', ', $booking->seat_numbers),
                    'price' => '₹' . number_format($booking->total_price),
                    'status' => ucfirst($booking->payment_status),
                    'status_type' => strtolower($booking->payment_status) == 'confirmed' ? 'confirmed' : (strtolower($booking->payment_status) == 'completed' ? 'completed' : 'cancelled'),
                    'icon' => $meta['emoji'],
                    'ticket_url' => route('payment.success') . 
                        '?title=' . urlencode($movieTitle) . 
                        '&seats=' . urlencode($booking->seat_numbers) . 
                        '&price=' . $booking->total_price .
                        '&image=' . urlencode($meta['image']) .
                        '&poster=' . urlencode($meta['poster']) .
                        '&emoji=' . urlencode($meta['emoji']) .
                        '&formats=' . urlencode($meta['formats']) .
                        '&languages=' . urlencode($meta['languages']) .
                        '&booking_date=' . urlencode($booking->booking_date) .
                        ($foodPriceVal > 0 ? '&food_items=' . urlencode($foodItemsStr) . '&food_price=' . $foodPriceVal : '')
                ];
            }
        } catch (\Exception $e) {
            // Fallback
        }
        $wishlists = [];
        try {
            $wishlists = \App\Models\Wishlist::where('user_id', $user->id)
                ->orderBy('id', 'desc')
                ->get();
        } catch (\Exception $e) {
            // Fallback
        }

        return view('pages.profile.dashboard', compact('bookings', 'wishlists'));
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

    public function toggleWishlist(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'type' => 'required|in:movie,event',
            'title' => 'required|string',
            'rating' => 'nullable|string',
            'genre' => 'nullable|string',
            'duration' => 'nullable|string',
            'emoji' => 'nullable|string',
            'poster' => 'nullable|string',
            'image' => 'nullable|string',
            'formats' => 'nullable|string',
            'languages' => 'nullable|string',
            'price' => 'nullable|string',
            'location' => 'nullable|string',
            'date_str' => 'nullable|string',
        ]);

        $existing = \App\Models\Wishlist::where('user_id', $user->id)
            ->where('type', $validated['type'])
            ->where('title', $validated['title'])
            ->first();

        if ($existing) {
            $existing->delete();
            return response()->json([
                'success' => true,
                'status' => 'removed',
                'message' => 'Removed from Wishlist!'
            ]);
        } else {
            \App\Models\Wishlist::create(array_merge($validated, ['user_id' => $user->id]));
            return response()->json([
                'success' => true,
                'status' => 'added',
                'message' => 'Added to Wishlist!'
            ]);
        }
    }
}