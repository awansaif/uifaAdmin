<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'country',
        'flag'
    ];


    public function players()
    {
        return $this->hasMany('App\Models\Player');
    }
}
