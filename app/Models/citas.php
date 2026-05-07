<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    protected $table = 'citas';

    protected $fillable = [
        'paciente_id', 'dentista_id', 'fecha_hora',
        'estatus', 'motivo', 'notas'
    ];

    protected $casts = [
        'fecha_hora' => 'datetime',
        'estatus'    => 'string',
    ];

    public $timestamps = false;

    public function paciente()
    {
        return $this->belongsTo(Pacientes::class, 'paciente_id');
    }

    public function dentista()
    {
        return $this->belongsTo(Dentistas::class, 'dentista_id');
    }
}