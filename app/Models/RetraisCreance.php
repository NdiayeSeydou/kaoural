<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RetraisCreance extends Model
{
    protected $table = 'retraiscreances';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'public_id',
        'creance_id',
        'stock_public_id',
        'designation',
        'code_article',
        'image',
        'categorie_id',
        'stock_initial',
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
        'prix_unitaire' => 'decimal:2',
        'prix_total' => 'decimal:2',
        'quantite_sortie' => 'decimal:2',
    ];

    /* ===================== RELATIONS ===================== */

    public function creance()
    {
        return $this->belongsTo(Creance::class, 'creance_id');
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_public_id', 'public_id');
    }
}
