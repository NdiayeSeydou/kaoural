<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [

        'name',

        'surname',

        'email',

        'telephone',

        'public_id',

        'adresse',

        'role',

        'password',

        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [

        'password',

        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [

            'email_verified_at' => 'datetime',

            'password' => 'hashed',
        ];
    }

    protected static function booted()
    {
        static::creating(function ($user) {

            if (empty($user->public_id)) {

                $user->public_id = Str::random(10);
            }
        });
    }

    // Dans app/Models/User.php

    public function getFormattedPhoneAttribute()
    {
        $phone = $this->telephone;

        if (empty($phone)) {

            return 'N/A';
        }

      
        if (str_starts_with($phone, '+223') || str_starts_with($phone, '+221')) {

            return substr($phone, 0, 4).' '.implode(' ', str_split(substr($phone, 4), 2));
        }

        return $phone;
    }
}
