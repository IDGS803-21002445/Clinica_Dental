<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('id', 'desc')->paginate(10);
        return view('Administrador.Usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('Administrador.Usuarios.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:100', 'unique:usuarios,email'],
            'rol' => ['required', 'in:admin,dentista,recepcionista'],
            'password' => ['required', 'string', 'min:4', 'max:255'],
        ]);

        $data['password'] = Hash::make($data['password']);

        Usuario::create($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado.');
    }

    public function edit(Usuario $usuario)
    {
        return view('Administrador.Usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:100', 'unique:usuarios,email,' . $usuario->id],
            'rol' => ['required', 'in:admin,dentista,recepcionista'],
            'password' => ['nullable', 'string', 'min:4', 'max:255'],
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado.');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado.');
    }
}
