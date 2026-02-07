<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    protected $fillable = [

        'public_id',

        'date_vente',

        'stock_id',

        'designation',

        'code_article',

        'image',

        'quantite',

        'prix_unitaire',

        'prix_total',

        'emplacement',
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
