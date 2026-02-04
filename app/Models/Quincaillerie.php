<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quincaillerie extends Model
{
    protected $fillable = [

        'public_id',

        'nom',

        'telephone',

        'adresse'
    ];

    public function retraits()
    {
        return $this->hasMany(RetraitStock::class, 'quincaillerie_id', 'id');
    }
}
