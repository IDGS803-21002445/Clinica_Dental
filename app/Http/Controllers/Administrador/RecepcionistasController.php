<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Recepcionistas;
use App\Models\Usuario;
use Illuminate\Http\Request;

class RecepcionistasController extends Controller
{
    public function index()
    {
        $recepcionistas = Recepcionistas::with('usuario')->orderBy('id', 'desc')->paginate(10);
        return view('Administrador.Recepcionistas.index', compact('recepcionistas'));
    }

    public function create()
    {
        $usuarios = Usuario::where('rol', 'recepcionista')
            ->whereDoesntHave('recepcionista')
            ->orderBy('email')
            ->get();

        return view('Administrador.Recepcionistas.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'usuario_id' => ['nullable', 'integer', 'exists:usuarios,id', 'unique:recepcionistas,usuario_id'],
        ]);

        Recepcionistas::create($data);

        return redirect()->route('recepcionistas.index')->with('success', 'Recepcionista registrado.');
    }

    public function edit(Recepcionistas $recepcionista)
    {
        $usuarios = Usuario::where('rol', 'recepcionista')
            ->where(function ($q) use ($recepcionista) {
                $q->whereDoesntHave('recepcionista')
                    ->orWhere('id', $recepcionista->usuario_id);
            })
            ->orderBy('email')
            ->get();

        return view('Administrador.Recepcionistas.edit', compact('recepcionista', 'usuarios'));
    }

    public function update(Request $request, Recepcionistas $recepcionista)
    {
        $data = $request->validate([
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'usuario_id' => ['nullable', 'integer', 'exists:usuarios,id', 'unique:recepcionistas,usuario_id,' . $recepcionista->id],
        ]);

        $recepcionista->update($data);

        return redirect()->route('recepcionistas.index')->with('success', 'Recepcionista actualizado.');
    }

    public function destroy(Recepcionistas $recepcionista)
    {
        $recepcionista->delete();
        return redirect()->route('recepcionistas.index')->with('success', 'Recepcionista eliminado.');
    }
}

