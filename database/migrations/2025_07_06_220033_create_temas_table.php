<?php

// database/migrations/2025_07_06_000003_create_temas_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemasTable extends Migration
{
    public function up()
    {
        Schema::create('temas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prueba_id')->constrained()->onDelete('cascade'); // relación con pruebas
            $table->string('nombre');
            $table->boolean('estudiado')->default(false); // para saber si ya fue estudiado
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('temas');
    }
}
