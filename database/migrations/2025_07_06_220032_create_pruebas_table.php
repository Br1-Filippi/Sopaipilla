<?php

// database/migrations/2025_07_06_000002_create_pruebas_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePruebasTable extends Migration
{
    public function up()
    {
        Schema::create('pruebas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained()->onDelete('cascade'); // relación con cursos
            $table->string('nombre');
            $table->dateTime('fecha'); // fecha y hora de la prueba
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pruebas');
    }
}

