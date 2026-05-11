<?php

namespace App\Http\Controllers\Recepcion;

use App\Http\Controllers\Controller;
use App\Models\Citas;
use App\Models\Dentistas;
use App\Models\Pacientes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    public function index()
    {
        $citas = Citas::with(['paciente', 'dentista'])
            ->orderBy('fecha_hora', 'desc')
            ->paginate(10);

        return view('Recepcion.Citas.index', compact('citas'));
    }
    
    public function getCitas()
    {
        $citas = Citas::with(['paciente', 'dentista'])
            ->orderBy('fecha_hora', 'desc')
            ->get()
            ->map(function ($cita) {
                $color = "";
                switch ($cita->estatus) {
                    case 'pendiente':
                        $color = "gray";
                        break;
                    case 'confirmada':
                        $color = "blue";
                        break;
                    case 'cancelada':
                        $color = "red";
                        break;
                    default:
                        $color = "green";
                        break;
                }
                return [
                    'id' => $cita->id,
                    'title' => $cita->motivo,
                    'start' => Carbon::parse($cita->fecha_hora)
                    ->addHours(6)
                    ->toIso8601String(),
                    'color' => $color,
                    'extendedProps' => [
                        'dentista' => $cita->dentista_id,
                        'paciente' => $cita->paciente_id,
                        'estatus' => $cita->estatus,
                    ]
                ];
            })
            ->toArray();
        
        return $citas;
    }
    
    public function getPacientes()
    {
        $pacientes = Pacientes::orderBy('nombre', 'asc')
            ->get()
            ->toArray();

        return $pacientes;
    }
    
    public function getDentistas()
    {
        $dentistas = Dentistas::orderBy('nombres', 'asc')
            ->get()
            ->toArray();

        return $dentistas;
    }
    

    public function create()
    {
        $pacientes = Pacientes::orderBy('nombre')->get();
        $dentistas = Dentistas::orderBy('nombres')->get();
        return view('Recepcion.Citas.create', compact('pacientes', 'dentistas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'paciente_id' => ['required', 'integer', 'exists:pacientes,id'],
            'dentista_id' => ['required', 'integer', 'exists:dentistas,id'],
            'fecha_hora' => ['required', 'date'],
            'estatus' => ['required', 'in:pendiente,confirmada,cancelada,completada'],
            'motivo' => ['nullable', 'string', 'max:255'],
            'notas' => ['nullable', 'string'],
        ]);

        Citas::create($data);

        return redirect()->route('citas.index')->with('success', 'Cita creada.');
    }

    public function edit(Citas $cita)
    {
        $pacientes = Pacientes::orderBy('nombre')->get();
        $dentistas = Dentistas::orderBy('nombres')->get();
        return view('Recepcion.Citas.edit', compact('cita', 'pacientes', 'dentistas'));
    }

    public function update(Request $request, Citas $cita)
    {
        $data = $request->validate([
            'paciente_id' => ['required', 'integer', 'exists:pacientes,id'],
            'dentista_id' => ['required', 'integer', 'exists:dentistas,id'],
            'fecha_hora' => ['required', 'date'],
            'estatus' => ['required', 'in:pendiente,confirmada,cancelada,completada'],
            'motivo' => ['nullable', 'string', 'max:255'],
            'notas' => ['nullable', 'string'],
        ]);

        $cita->update($data);

        return redirect()->route('citas.index')->with('success', 'Cita actualizada.');
    }

    public function destroy(Citas $cita)
    {
        $cita->delete();
        return redirect()->route('citas.index')->with('success', 'Cita eliminada.');
    }
}

