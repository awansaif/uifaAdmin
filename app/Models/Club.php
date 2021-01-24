<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    public function clubs()
    {
        return $this->belongsTo('App\Models\MainClub', 'club_id');
    }
}
