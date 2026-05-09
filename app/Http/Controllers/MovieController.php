<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return view('pages.movies.index');
    }

    public function show()
    {
        return view('pages.movies.show');
    }

    public function seats()
    {
        return view('pages.movies.seat-selection');
    }
}