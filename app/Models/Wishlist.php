<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'title',
        'rating',
        'genre',
        'duration',
        'emoji',
        'poster',
        'image',
        'formats',
        'languages',
        'price',
        'location',
        'date_str'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
