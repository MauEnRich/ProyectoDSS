<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Nota extends Model
{
    use HasFactory, SoftDeletes;  // <-- aquí agregas SoftDeletes

    protected $fillable = [
    'titulo',
    'contenido',
    'imagen',
    'user_id',
    'favorito',
];


    protected $dates = ['deleted_at']; // para el soft delete
}
