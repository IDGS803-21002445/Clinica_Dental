<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recepcionistas extends Model
{
    protected $table = 'recepcionistas';

    protected $fillable = ['nombres', 'apellidos', 'usuario_id'];

    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id');
    }
}