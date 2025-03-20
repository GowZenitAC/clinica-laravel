<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('informacion_medica', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')
            ->constrained('pacientes')
            ->onUpdate('cascade')
            ->nullOnDelete();
            $table->string('diagnostico');
            $table->string('historial');
            $table->date('primera_valoracion');
            $table->string('observaciones');
            $table->string('seguimiento');
            $table->integer('citas_a_tomar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacion_medica');
    }
};
