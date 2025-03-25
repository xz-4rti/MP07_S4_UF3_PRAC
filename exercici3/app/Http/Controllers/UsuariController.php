<?php

namespace App\Http\Controllers;

use App\Models\Usuari;
use Illuminate\Http\Request;

class UsuariController extends Controller
{
    public function index()
    {
        // Obtiene todos los registros de la tabla usuaris
        $usuaris = Usuari::all();

        // Retorna la vista 'usuaris.index' y pasa los usuarios obtenidos
        return view('usuaris.index', compact('usuaris'));
    }

    public function create()
    {
        // Retorna la vista para crear un nuevo usuari
        return view('usuaris.create');
    }

    public function store(Request $request)
    {
        // Valida los datos del formulario antes de guardarlos
        $validated = $request->validate([
            'nom' => 'required|string|max:255', // El nombre es obligatorio, de tipo string y máximo 255 caracteres
            'email' => 'required|email|unique:usuaris,email', // El email es obligatorio, formato válido y único en la tabla usuaris
            'edat' => 'required|integer|min:18', // La edad es obligatoria, debe ser un número entero y mínimo 18 años
        ]);

        // Crea un nuevo usuario con los datos validados
        Usuari::create($validated);

        // Redirige a la lista de usuarios con un mensaje de éxito
        return redirect()->route('usuaris.index')
            ->with('success', 'Usuari creat correctament');
    }

    public function show(Usuari $usuari)
    {
        // Retorna la vista de detalles de un usuario específico
        return view('usuaris.show', compact('usuari'));
    }

    public function edit(Usuari $usuari)
    {
        // Retorna la vista de edición para un usuario específico
        return view('usuaris.edit', compact('usuari'));
    }

    public function update(Request $request, Usuari $usuari)
    {
        // Valida los datos enviados en la petición antes de actualizar
        $validated = $request->validate([
            'nom' => 'required|string|max:255', // Nombre obligatorio, string, máximo 255 caracteres
            'email' => 'required|email|unique:usuaris,email,' . $usuari->id, // Email obligatorio, único excepto el del usuario actual
            'edat' => 'required|integer|min:18', // Edad obligatoria, número entero y mínimo 18
        ]);

        // Actualiza los datos del usuario con los valores validados
        $usuari->update($validated);

        // Redirige a la lista de usuarios con un mensaje de éxito
        return redirect()->route('usuaris.index')
            ->with('success', 'Usuari actualitzat correctament');
    }

    public function destroy(Usuari $usuari)
    {
        // Elimina el usuario de la base de datos
        $usuari->delete();

        // Redirige a la lista de usuarios con un mensaje de éxito
        return redirect()->route('usuaris.index')
            ->with('success', 'Usuari eliminat correctament');
    }
}
