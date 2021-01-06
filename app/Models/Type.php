<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['nom'];

    public function projets()
    {
        return $this->hasMany(Projet::class);
    }
}
