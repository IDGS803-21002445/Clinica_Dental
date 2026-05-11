<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dentistas extends Model
{
    protected $table = 'dentistas';

    protected $fillable = [
        'nombres', 'apellidos',
        'especialidad', 'usuario_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function citas()
    {
        return $this->hasMany(Citas::class, 'dentista_id');
    }
}