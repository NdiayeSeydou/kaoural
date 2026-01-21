<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',

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
        return $this->belongsTo(Categorie::class);
    }

     public function stocks()
    {
        return $this->hasMany(Stock::class, 'categorie_id');
    }
}
