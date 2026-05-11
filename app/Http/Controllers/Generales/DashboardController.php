<?php

namespace App\Http\Controllers\Generales;

use App\Http\Controllers\Controller;
use App\Models\Citas;
use App\Models\Dentistas;
use App\Models\Pacientes;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $rol = Auth::user()?->rol;

        $metrics = [
            'total_pacientes' => Pacientes::count(),
            'total_citas' => Citas::count(),
            'citas_pendientes' => Citas::where('estatus', 'pendiente')->count(),
            'dentistas_activos' => Dentistas::count(),
        ];

        return view('welcome', [
            'rol' => $rol,
            'metrics' => $metrics,
        ]);
    }
}
