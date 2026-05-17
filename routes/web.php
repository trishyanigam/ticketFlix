<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/movies', [MovieController::class, 'index'])
    ->name('movies.index');

Route::get('/movie-detail', [MovieController::class, 'show'])
    ->name('movies.show');

Route::get('/seat-selection', [MovieController::class, 'seats'])
    ->name('movies.seats');

Route::get('/events', [EventController::class, 'index'])
    ->name('events.index');

Route::get('/event-detail', [EventController::class, 'show'])
    ->name('events.show');

Route::get('/event-seats', [EventController::class, 'seats'])
    ->name('events.seats');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'dashboard'])
        ->name('profile.dashboard');
    Route::post('/profile/update', [ProfileController::class, 'update'])
        ->name('profile.update');
});

Route::get('/payment', [PaymentController::class, 'checkout'])
    ->name('payment.checkout');

Route::get('/success', [PaymentController::class, 'success'])
    ->name('payment.success');

Route::get('/failed', [PaymentController::class, 'failed'])
    ->name('payment.failed');

Route::get('/admin', [DashboardController::class, 'index'])
    ->name('admin.dashboard');
require __DIR__.'/auth.php';