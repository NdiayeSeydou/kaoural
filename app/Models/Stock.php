<?php

namespace App\Models;

use App\Helpers\Base62;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [

        'code_article',

        'image',

        'designation',

        'categorie_id',

        'stock_initial',

        'quantite_entree',

        'quantite_sortie',

        'emplacement',

        'quantite_restante',

        'fournisseur_id',

        'status',

        'prix_unitaire',

        'prix_total',

        'date',

        'public_id',

    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            if (!$model->public_id) {

                $model->public_id = Str::random(10);
            }
        });
    }



    protected $appends = ['quantite_calculee'];


    public function getQuantiteCalculeeAttribute()
    {
        return $this->stock_initial + $this->quantite_entree - $this->retraits()->sum('quantite_sortie');
    }

    public function getStatusLabelAttribute()
    {
        if ($this->quantite_restante == 0) {
            return 'rupture';
        } elseif ($this->quantite_restante <= 5) {
            return 'baisse';
        } else {
            return 'disponible';
        }
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    // Relation avec le fournisseur (optionnel)
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'fournisseur_id');
    }


    public function histories()
    {
        return $this->hasMany(StockHistory::class);
    }


    public function retraits()
    {
        return $this->hasMany(RetraitStock::class, 'stock_public_id', 'public_id');
    }
}
