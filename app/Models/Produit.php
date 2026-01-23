<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [

        'public_id',

        'designation',

        'description',

        'categorie_id',

        'prix_unitaire',

        'image',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
