<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Creance extends Model
{
    use HasFactory;

    protected $fillable = [
        'public_id',
        'nom',
        'telephone',
        'adresse',
        'montant_total',
    ];

    /* ===================== RELATIONS ===================== */

    public function retraits()
    {
        return $this->hasMany(RetraisCreance::class, 'creance_id', 'id');
    }

  
    public function getResteAPayerAttribute()
    {
        $totalRetraits = $this->retraits->sum('prix_total');
        return ($this->montant_total ?? 0) - $totalRetraits;
    }

    // Statut dynamique (PAS EN BASE)
    public function getStatutAttribute()
    {
        return $this->reste_a_payer <= 0 ? 'Paid' : 'Pending';
    }
}
