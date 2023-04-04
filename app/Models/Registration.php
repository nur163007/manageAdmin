<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Registration extends Model implements JWTSubject
{
    use HasFactory;

    public function getJWTIdentifier()
    {
        // TODO: Implement getJWTIdentifier() method.
    }

    public function getJWTCustomClaims()
    {
        // TODO: Implement getJWTCustomClaims() method.
    }

    protected $fillable = [
        'firstname','lastname','email','mobile','country','terms','verification_link','is_verified','email_verified_at','remember_token','created_at','updated_at'
    ];
}
