<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariController;

// Define una ruta de tipo "resource" para el recurso 'usuaris'.
// Esto crea automáticamente rutas RESTful (index, create, store, show, edit, update, destroy)
// y las asocia al controlador 'UsuariController'.

Route::resource('usuaris', UsuariController::class);
