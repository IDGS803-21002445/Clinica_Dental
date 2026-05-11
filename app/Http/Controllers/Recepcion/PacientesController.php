<?php

namespace App\Http\Controllers\Recepcion;

use App\Http\Controllers\Controller;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->get('q', ''));

        $pacientes = Pacientes::query()
            ->when($q !== '', function ($query) use ($q) {
                $query->where('nombre', 'like', "%{$q}%")
                    ->orWhere('telefono', 'like', "%{$q}%")
                    ->orWhere('correo', 'like', "%{$q}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('Recepcion.Pacientes.index', compact('pacientes', 'q'));
    }

    public function create()
    {
        return view('Recepcion.Pacientes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'telefono' => ['nullable', 'string', 'max:20'],
            'correo' => ['nullable', 'email', 'max:255'],
            'direccion' => ['nullable', 'string', 'max:255'],
            'fecha_nacimiento' => ['nullable', 'date'],
        ]);

        Pacientes::create($data);

        return redirect()->route('pacientes.index')->with('success', 'Paciente registrado.');
    }

    public function edit(Pacientes $paciente)
    {
        return view('Recepcion.Pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, Pacientes $paciente)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'telefono' => ['nullable', 'string', 'max:20'],
            'correo' => ['nullable', 'email', 'max:255'],
            'direccion' => ['nullable', 'string', 'max:255'],
            'fecha_nacimiento' => ['nullable', 'date'],
        ]);

        $paciente->update($data);

        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado.');
    }

    public function destroy(Pacientes $paciente)
    {
        $paciente->delete();
        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado.');
    }
}

