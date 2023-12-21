<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hall;
use App\Models\User;

class HallReview extends Model
{
    use HasFactory;
    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
