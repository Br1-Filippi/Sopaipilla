<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    protected $fillable = ['curso_id', 'nombre', 'fecha'];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function temas()
    {
        return $this->hasMany(Tema::class);
    }
}
