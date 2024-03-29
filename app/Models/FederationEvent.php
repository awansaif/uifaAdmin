<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FederationEvent extends Model
{
    use HasFactory;
    public function federations()
    {
        return $this->belongsTo('App\Models\FederationMovement', 'federation_id');
    }
}
