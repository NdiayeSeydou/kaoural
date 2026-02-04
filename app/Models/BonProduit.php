<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BonProduit extends Model
{
    use HasFactory;

    protected $fillable = [

        'bon_id',

        'produit',

        'quantite',

        'libelle',
    ];

    public function bon()
    {
        return $this->belongsTo(Bon::class);
    }
}
