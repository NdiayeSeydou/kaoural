<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Fournisseur extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',

        'adresse',

        'categorie_id',

        'telephone',

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

    public function categorie()
    {

        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function stockHistories()
    {
        return $this->hasMany(StockHistory::class);
    }

    public function getTelephoneFormatteAttribute()
    {
        $tel = $this->telephone;

        if (str_starts_with($tel, '+223')) {
            return '🇲🇱 +223 ' . implode(' ', str_split(substr($tel, 4), 2));
        }

        if (str_starts_with($tel, '+33')) {
            return '🇫🇷 +33 ' . implode(' ', str_split(substr($tel, 3), 2));
        }

        return $tel;
    }
}
