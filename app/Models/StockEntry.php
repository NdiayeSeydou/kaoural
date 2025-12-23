<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockEntry extends Model
{
    protected $fillable = [
        'stock_id',
        'quantite',
        'date',
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
