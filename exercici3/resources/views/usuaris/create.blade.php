@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear nou usuari</h1>
    
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuaris.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}" required>
            @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="edat">Edat</label>
            <input type="number" class="form-control @error('edat') is-invalid @enderror" id="edat" name="edat" value="{{ old('edat') }}" required min="18">
            @error('edat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('usuaris.index') }}" class="btn btn-secondary">Cancel·lar</a>
    </form>
</div>
@endsection