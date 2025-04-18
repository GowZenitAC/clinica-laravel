<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('fecha_nacimiento');
            $table->string('genero');
            $table->string('telefono');
            $table->string('direccion');
            $table->foreignId('id_especialidad')
            ->nullable()
            ->constrained('especialidades')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->enum('status', ['Alta', 'Activo', 'Inactivo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
