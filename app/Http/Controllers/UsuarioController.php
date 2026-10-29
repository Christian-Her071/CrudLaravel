<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Empresa;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas = Empresa::all(['id_empresa', 'nombre']);
        return view('usuarios.create', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|max:100|unique:usuario,username',
            'password' => 'required|min:5',
            'rol' => 'required|in:admin,vendedor,supervisor',
            'activo' => 'required|boolean',

        ]);

        Usuario::create($request->all());

        return redirect ()->route('usuario.index')
                        ->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empresas = Empresa::all(['id_empresa', 'nombre']);
        return view('usuarios.edit', compact('usuario', 'empresas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required|max:100|unique:usuario,username,' . $usuario->id_usuario . ',id_usuario',
            'password' => 'required|min:5',
            'rol' => 'required|in:admin,vendedor,supervisor',
            'activo' => 'required|boolean',

            'id_empresa' => 'required|exists:empresa,id_empresa'
        ]);

        $usuario->update($request->all());

        return redirect()->route('usuarios.index')
                        ->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')
                        ->with('success', 'Cliente eliminado exitosamente.');
    }
}
