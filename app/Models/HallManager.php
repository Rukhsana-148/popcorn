<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallManager extends Model
{
    use HasFactory;
    public function movies()
    {
        return $this->hasMany(Movie::class, 'hall_id', 'hall_id');
    }

public function hall()
{
    return $this->belongsTo(Hall::class);
}

}
