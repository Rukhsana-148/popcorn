<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    protected $fillable = [
        'hall_id',
        'movie_id',
        
        'price',
        'user_id',
        'show_time',

    ];
}
