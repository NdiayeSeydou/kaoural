<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RetraitStock extends Model
{
    protected $table = 'retraits_stock';

    protected $fillable = [

        'public_id',

        'quincaillerie_id',

        'stock_public_id',

        'designation',

        'code_article',

        'image',

        'categorie_id',

        'stock_initial',

        'quantite_entree',

        'quantite_sortie',

        'quantite_restante',

        'fournisseur_id',

        'emplacement',

        'status',

        'prix_unitaire',

        'prix_total',

        'date',
    ];

    protected $casts = [

        'date' => 'date',

        'date_retrait' => 'date',
    ];

    public function quincaillerie()
    {
        return $this->belongsTo(Quincaillerie::class);
    }

    public function retraits()
    {
        return $this->hasMany(RetraitStock::class, 'stock_public_id', 'public_id');
    }
    
}
