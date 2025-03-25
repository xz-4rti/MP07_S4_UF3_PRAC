<?php

// Define el espacio de nombres para organizar el código dentro de la carpeta App\Models
namespace App\Models;

// Importa la clase HasFactory para usarla en el modelo
use Illuminate\Database\Eloquent\Factories\HasFactory;
// Importa la clase Model, que es la base para todos los modelos de Eloquent
use Illuminate\Database\Eloquent\Model;

// Define la clase Usuari, que representa un modelo de Eloquent
class Usuari extends Model
{
    // Usa el trait HasFactory para habilitar la creación de instancias del modelo mediante factories
    use HasFactory;

    // Define los atributos que se pueden asignar masivamente (mass assignment)
    protected $fillable = ['nom', 'email', 'edat'];
}
