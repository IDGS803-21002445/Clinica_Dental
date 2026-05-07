<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';

    protected $fillable = ['username', 'password', 'rol'];

    protected $hidden = ['password'];

    protected $casts = [
        'rol' => 'string',
    ];

    public $timestamps = false;

    public function dentista()
    {
        return $this->hasOne(Dentistas::class, 'usuario_id');
    }

    public function recepcionista()
    {
        return $this->hasOne(Recepcionistas::class, 'usuario_id');
    }
}