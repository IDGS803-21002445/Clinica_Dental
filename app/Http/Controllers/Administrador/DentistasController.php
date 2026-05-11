<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Dentistas;
use App\Models\Usuario;
use Illuminate\Http\Request;

class DentistasController extends Controller
{
    public function index()
    {
        $dentistas = Dentistas::with('usuario')->orderBy('id', 'desc')->paginate(10);
        return view('Administrador.Dentistas.index', compact('dentistas'));
    }

    public function create()
    {
        $usuarios = Usuario::where('rol', 'dentista')
            ->whereDoesntHave('dentista')
            ->orderBy('email')
            ->get();
        return view('Administrador.Dentistas.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'especialidad' => ['nullable', 'string', 'max:255'],
            'usuario_id' => ['nullable', 'integer', 'exists:usuarios,id', 'unique:dentistas,usuario_id'],
        ]);

        Dentistas::create($data);

        return redirect()->route('dentistas.index')->with('success', 'Dentista registrado.');
    }

    public function edit(Dentistas $dentista)
    {
        $usuarios = Usuario::where('rol', 'dentista')
            ->where(function ($q) use ($dentista) {
                $q->whereDoesntHave('dentista')
                    ->orWhere('id', $dentista->usuario_id);
            })
            ->orderBy('email')
            ->get();

        return view('Administrador.Dentistas.edit', compact('dentista', 'usuarios'));
    }

    public function update(Request $request, Dentistas $dentista)
    {
        $data = $request->validate([
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'especialidad' => ['nullable', 'string', 'max:255'],
            'usuario_id' => ['nullable', 'integer', 'exists:usuarios,id', 'unique:dentistas,usuario_id,' . $dentista->id],
        ]);

        $dentista->update($data);

        return redirect()->route('dentistas.index')->with('success', 'Dentista actualizado.');
    }

    public function destroy(Dentistas $dentista)
    {
        $dentista->delete();
        return redirect()->route('dentistas.index')->with('success', 'Dentista eliminado.');
    }
}

