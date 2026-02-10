<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
     protected $fillable = [

        'public_id',

        'title',

        'description',

        'image',

    ];

}
