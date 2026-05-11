<?php

namespace App\Http\Controllers\Clinica;

use App\Http\Controllers\Controller;
use App\Models\Citas;
use App\Models\Historiales;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class HistorialesController extends Controller
{
    public function index(Request $request)
    {
        $pacienteId = $request->get('paciente_id');

        $historiales = Historiales::with('paciente')
            ->when($pacienteId, fn ($q) => $q->where('paciente_id', $pacienteId))
            ->orderBy('fecha', 'desc')
            ->paginate(10)
            ->withQueryString();

        $pacientes = Pacientes::orderBy('nombre')->get();

        return view('Clinica.Historiales.index', compact('historiales', 'pacientes', 'pacienteId'));
    }

    public function create()
    {
        $pacientes = Pacientes::orderBy('nombre')->get();
        return view('Clinica.Historiales.create', compact('pacientes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'paciente_id' => ['required', 'integer', 'exists:pacientes,id'],
            'fecha' => ['required', 'date'],
            'diagnostico' => ['nullable', 'string'],
            'tratamiento' => ['nullable', 'string'],
            'observaciones' => ['nullable', 'string'],
        ]);

        Historiales::create($data);

        return redirect()->route('historiales.index')->with('success', 'Historial registrado.');
    }

    public function edit(Historiales $historiale)
    {
        $pacientes = Pacientes::orderBy('nombre')->get();
        return view('Clinica.Historiales.edit', ['historial' => $historiale, 'pacientes' => $pacientes]);
    }

    public function update(Request $request, Historiales $historiale)
    {
        $data = $request->validate([
            'paciente_id' => ['required', 'integer', 'exists:pacientes,id'],
            'fecha' => ['required', 'date'],
            'diagnostico' => ['nullable', 'string'],
            'tratamiento' => ['nullable', 'string'],
            'observaciones' => ['nullable', 'string'],
        ]);

        $historiale->update($data);

        return redirect()->route('historiales.index')->with('success', 'Historial actualizado.');
    }

    public function destroy(Historiales $historiale)
    {
        $historiale->delete();
        return redirect()->route('historiales.index')->with('success', 'Historial eliminado.');
    }
    
    public function visualizar(Historiales $historiale)
    {
        // Cargar relaciones necesarias
        $historiale->load('paciente');

        // Obtener citas del paciente
        $citas = Citas::where('paciente_id', $historiale->paciente_id)
            ->orderBy('fecha_hora', 'desc')
            ->get();

        return view('Clinica.Historiales.visualizar', [
            'historial' => $historiale,
            'citas' => $citas
        ]);
    }
}

