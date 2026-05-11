<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens;
    protected $table = 'usuarios';

    protected $fillable = ['email', 'password', 'rol'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'rol' => 'string',
        'password' => 'hashed',
    ];

    public function dentista()
    {
        return $this->hasOne(Dentistas::class, 'usuario_id');
    }

    public function recepcionista()
    {
        return $this->hasOne(Recepcionistas::class, 'usuario_id');
    }
}