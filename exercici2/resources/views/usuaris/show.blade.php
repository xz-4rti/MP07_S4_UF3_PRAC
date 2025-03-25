@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalls de l'usuari</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $usuari->nom }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $usuari->email }}</p>
            <p class="card-text"><strong>Edat:</strong> {{ $usuari->edat }}</p>
            <p class="card-text"><strong>Creat:</strong> {{ $usuari->created_at }}</p>
            <p class="card-text"><strong>Actualitzat:</strong> {{ $usuari->updated_at }}</p>

            <a href="{{ route('usuaris.edit', $usuari->id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('usuaris.index') }}" class="btn btn-secondary">Tornar</a>
        </div>
    </div>
</div>
@endsection