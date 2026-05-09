<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_name',

        'movie_id',

        'seat_numbers',

        'show_time',

        'booking_date',

        'total_price',

        'payment_status'
    ];
}