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
        $usuaris = DB::table('usuaris')->get();
        return view('usuaris.index', compact('usuaris'));
    }

    public function create()
    {
        return view('usuaris.create');
    }

    public function store(StoreUsuariRequest $request)
    {
        DB::table('usuaris')->insert($request->validated());
        return redirect()->route('usuaris.index')->with('success', 'Usuari creat correctament');
    }

    public function show($id)
    {
        $usuari = DB::table('usuaris')->where('id', $id)->first();
        return view('usuaris.show', compact('usuari'));
    }

    public function edit($id)
    {
        $usuari = DB::table('usuaris')->where('id', $id)->first();
        return view('usuaris.edit', compact('usuari'));
    }

    public function update(UpdateUsuariRequest $request, $id)
    {
        DB::table('usuaris')
            ->where('id', $id)
            ->update($request->validated());
            
        return redirect()->route('usuaris.index')->with('success', 'Usuari actualitzat correctament');
    }

    public function destroy($id)
    {
        DB::table('usuaris')->where('id', $id)->delete();
        return redirect()->route('usuaris.index')->with('success', 'Usuari eliminat correctament');
    }
}