@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear nou usuari</h1>
    
    <form action="{{ route('usuaris.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="edat">Edat</label>
            <input type="number" class="form-control" id="edat" name="edat" required min="18">
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('usuaris.index') }}" class="btn btn-secondary">Cancel·lar</a>
    </form>
</div>
@endsection