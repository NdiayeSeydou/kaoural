<?php

namespace App\Models;

use App\Helpers\Base62;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;


class StockHistory extends Model
{
    use HasFactory;

    protected $fillable = [

        'stock_id',

        'fournisseur_id',

        'quantite_entree',

        'emplacement',

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


    public function stock()
    {

        return $this->belongsTo(Stock::class);
    }

    public function fournisseur()
    {

        return $this->belongsTo(Fournisseur::class);
    }
}
