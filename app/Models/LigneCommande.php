<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    protected $fillable = [

        'commande_id', 

        'designation', 

        'quantite', 

        'prix_unitaire'
    ];

   
    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}