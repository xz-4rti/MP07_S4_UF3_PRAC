@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Llistat d'usuaris</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('usuaris.create') }}" class="btn btn-primary mb-3">Nou usuari</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Edat</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuaris as $usuari)
            <tr>
                <td>{{ $usuari->id }}</td>
                <td>{{ $usuari->nom }}</td>
                <td>{{ $usuari->email }}</td>
                <td>{{ $usuari->edat }}</td>
                <td>
                    <a href="{{ route('usuaris.show', $usuari->id) }}" class="btn btn-info">Veure</a>
                    <a href="{{ route('usuaris.edit', $usuari->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('usuaris.destroy', $usuari->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Estàs segur?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection