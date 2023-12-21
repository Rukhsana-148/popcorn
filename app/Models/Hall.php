<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;
    public function movies()
{
    return $this->hasMany(Movie::class);
}
public function movieTrailers()
{
    return $this->hasMany(MovieTrailer::class);
}

public function hallManager()
{
    return $this->hasOne(HallManager::class);
}

}
