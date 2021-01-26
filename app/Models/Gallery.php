<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'projet_id',
        'legende',
        'image',
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
