<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    protected $fillable = ['libelle'];

    /**
     * un etat peut avoir un ou plusieurs projets
     */
    public function projets()
    {
        return $this->hasMany(Projet::class);
    }
}

