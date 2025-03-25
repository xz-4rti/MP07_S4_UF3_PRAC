<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// New imports
use App\Http\Requests\StoreUsuariRequest;
use App\Http\Requests\UpdateUsuariRequest;

class UsuariController extends Controller
{
    public function index()
    {
        // Obtiene todos los registros de la tabla 'usuaris' utilizando el constructor de consultas de Laravel
        $usuaris = DB::table('usuaris')->get();

        // Retorna la vista 'usuaris.index' y pasa los usuarios obtenidos
        return view('usuaris.index', compact('usuaris'));
    }

    public function create()
    {
        // Retorna la vista para crear un nuevo usuari
        return view('usuaris.create');
    }

    public function store(StoreUsuariRequest $request)
    {
        // Inserta un nuevo usuario en la base de datos con los datos validados
        DB::table('usuaris')->insert($request->validated());

        // Redirige a la lista de usuarios con un mensaje de éxito
        return redirect()->route('usuaris.index')->with('success', 'Usuari creat correctament');
    }

    public function show($id)
    {
        // Obtiene un usuario específico por su ID
        $usuari = DB::table('usuaris')->where('id', $id)->first();

        // Retorna la vista de detalles del usuario encontrado
        return view('usuaris.show', compact('usuari'));
    }

    public function edit($id)
    {
        // Obtiene un usuario específico por su ID para edición
        $usuari = DB::table('usuaris')->where('id', $id)->first();

        // Retorna la vista de edición para el usuario obtenido
        return view('usuaris.edit', compact('usuari'));
    }

    public function update(UpdateUsuariRequest $request, $id)
    {
        // Actualiza los datos del usuario con la información validada
        DB::table('usuaris')
            ->where('id', $id)
            ->update($request->validated());

        // Redirige a la lista de usuarios con un mensaje de éxito
        return redirect()->route('usuaris.index')->with('success', 'Usuari actualitzat correctament');
    }

    public function destroy($id)
    {
        // Elimina el usuario de la base de datos basado en su ID
        DB::table('usuaris')->where('id', $id)->delete();

        // Redirige a la lista de usuarios con un mensaje de éxito
        return redirect()->route('usuaris.index')->with('success', 'Usuari eliminat correctament');
    }
}
