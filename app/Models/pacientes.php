<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    protected $table = 'pacientes';

    protected $fillable = [
        'nombre', 'telefono', 'correo',
        'fecha_nacimiento', 'direccion'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    public $timestamps = false;

    public function citas()
    {
        return $this->hasMany(Citas::class, 'paciente_id');
    }

    public function historiales()
    {
        return $this->hasMany(Historiales::class, 'paciente_id');
    }
}