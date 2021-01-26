<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temoignage extends Model
{
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
