<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historiales extends Model
{
    protected $table = 'historiales';

    protected $fillable = [
        'paciente_id', 'fecha',
        'diagnostico', 'tratamiento', 'observaciones'
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    public function paciente()
    {
        return $this->belongsTo(Pacientes::class, 'paciente_id');
    }
}