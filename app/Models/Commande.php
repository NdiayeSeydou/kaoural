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

    // Dans App\Models\Commande.php

public function getTelephoneFormateAttribute()
{
    $phone = str_replace(' ', '', $this->telephone);
    
    // Regex : Groupe 1 = l'indicatif (+ suivi de chiffres), Groupe 2 = le reste
    if (preg_match('/^(\+\d+)(\d+)$/', $phone, $matches)) {
        $indicatif = $matches[1];
        $reste = $matches[2];
        // Formate le reste par groupes de 2
        return $indicatif . ' ' . trim(chunk_split($reste, 2, ' '));
    }

    return $this->telephone;
}
}
