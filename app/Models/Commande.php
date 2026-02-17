<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable =
        [
            'public_id',

            'user_id',

            'telephone',

            'nom_client',

            'adresse',

            'montant_total',

            'statut',

        ];

    public function lignes()
    {
        return $this->hasMany(LigneCommande::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
