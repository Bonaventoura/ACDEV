<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    protected $fillable = [
        'nom_partenaire',
        'description',
        'logo'
    ];

    public function projets()
    {
        return $this->belongsToMany(Projet::class);
    }
}
