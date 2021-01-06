<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'titre',
        'type_id',
        'etat_id',
        'localite',
        'beneficiaires',
        'objectifs',
        'resultats',
        'description',
        'cout_projet',
        'date_start',
        'date_end',
        'image'
    ];

    public function etat()
    {
        return $this->belongsTo(Etat::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function partenaires()
    {
        return $this->belongsToMany(Partenaire::class)->withTimestamps();
    }
}
