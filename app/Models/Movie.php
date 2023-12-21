<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    public function hallManager()
    {
        return $this->belongsTo(HallManager::class, 'hall_id', 'hall_id');
    }
    public function hall()
{
    return $this->belongsTo(Hall::class);
}
}
