<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Movie;
use App\Models\Event;
use App\Models\Booking;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Restrict access strictly to the Admin user
        if (Auth::user()->email !== 'admin@ticketflix.com') {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }

        // Fetch real database statistics
        $totalBookings = Booking::count();
        $totalRevenue = Booking::sum('total_price');
        $totalUsers = User::count();
        $activeMovies = Movie::count();

        // Fetch records for managing inside the dashboard
        $movies = Movie::orderBy('id', 'desc')->get();
        $events = Event::orderBy('id', 'desc')->get();
        $bookings = Booking::orderBy('id', 'desc')->get();
        $users = User::orderBy('id', 'desc')->get();

        return view('pages.admin.dashboard', compact(
            'totalBookings',
            'totalRevenue',
            'totalUsers',
            'activeMovies',
            'movies',
            'events',
            'bookings',
            'users'
        ));
    }

    public function action(Request $request)
    {
        // Restrict actions strictly to the Admin user
        if (Auth::user()->email !== 'admin@ticketflix.com') {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }

        $action = $request->input('action');

        if ($action === 'add_movie') {
            $request->validate([
                'title' => 'required|string|max:255',
                'genre' => 'required|string',
                'duration' => 'required|string',
                'language' => 'required|string',
                'rating' => 'required|string',
                'release_date' => 'required|date',
            ]);

            Movie::create([
                'title' => $request->input('title'),
                'description' => $request->input('description', 'Exciting movie show.'),
                'genre' => $request->input('genre'),
                'duration' => $request->input('duration'),
                'language' => $request->input('language'),
                'rating' => $request->input('rating'),
                'poster' => $request->input('poster', 'poster-1'),
                'release_date' => $request->input('release_date'),
            ]);

            return redirect()->route('admin.dashboard')->with('success', 'Movie added successfully!');
        }

        if ($action === 'delete_movie') {
            Movie::destroy($request->input('id'));
            return redirect()->route('admin.dashboard')->with('success', 'Movie deleted successfully!');
        }

        if ($action === 'add_event') {
            $request->validate([
                'title' => 'required|string|max:255',
                'location' => 'required|string',
                'event_date' => 'required|date',
                'event_time' => 'required|string',
                'price' => 'required|numeric',
                'category' => 'required|string',
            ]);

            Event::create([
                'title' => $request->input('title'),
                'description' => $request->input('description', 'Fabulous live event.'),
                'location' => $request->input('location'),
                'event_date' => $request->input('event_date'),
                'event_time' => $request->input('event_time'),
                'banner' => $request->input('banner', 'concert-banner'),
                'category' => $request->input('category'),
                'price' => $request->input('price'),
            ]);

            return redirect()->route('admin.dashboard')->with('success', 'Event added successfully!');
        }

        if ($action === 'delete_event') {
            Event::destroy($request->input('id'));
            return redirect()->route('admin.dashboard')->with('success', 'Event deleted successfully!');
        }

        if ($action === 'delete_booking') {
            Booking::destroy($request->input('id'));
            return redirect()->route('admin.dashboard')->with('success', 'Booking deleted successfully!');
        }

        if ($action === 'delete_user') {
            $user = User::find($request->input('id'));
            if ($user && $user->email !== 'admin@ticketflix.com') {
                $user->delete();
                return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully!');
            }
            return redirect()->route('admin.dashboard')->with('error', 'Cannot delete admin user.');
        }

        return redirect()->route('admin.dashboard');
    }
}