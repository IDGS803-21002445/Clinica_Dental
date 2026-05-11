<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recepcionistas extends Model
{
    protected $table = 'recepcionistas';

    protected $fillable = ['nombres', 'apellidos', 'usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}