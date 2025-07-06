<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;

    protected $fillable = ['prueba_id', 'nombre', 'estudiado'];

    public function prueba()
    {
        return $this->belongsTo(Prueba::class);
    }

    protected $casts = [
        'estudiado' => 'boolean',
    ];
}
