<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * Les attributs pouvant être assignés.
     */
    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'address',
        'image',
        'password',
    ];

    /**
     * Attributs cachés lors de la sérialisation.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting des attributs.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 🔐 JWT Methods
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    /**
     * Relation avec le modèle Task.
     */
    public function tasks()
{
    return $this->hasMany(Task::class);
}

}
