<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bon extends Model
{
    protected $fillable = [

        'public_id',

        'destinataire',

        'date_emission',

        'status',


    ];


    public $timestamps = false;

    public function produits()
    {
        return $this->hasMany(BonProduit::class);
    }
}
