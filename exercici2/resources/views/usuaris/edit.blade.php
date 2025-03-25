@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar usuari</h1>
    
    <form action="{{ route('usuaris.update', $usuari->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $usuari->nom }}" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $usuari->email }}" required>
        </div>
        
        <div class="form-group">
            <label for="edat">Edat</label>
            <input type="number" class="form-control" id="edat" name="edat" value="{{ $usuari->edat }}" required min="18">
        </div>
        
        <button type="submit" class="btn btn-primary">Actualitzar</button>
        <a href="{{ route('usuaris.index') }}" class="btn btn-secondary">Cancel·lar</a>
    </form>
</div>
@endsection