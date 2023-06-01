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
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_id'); //Id Materia que le pertenece la configuración
            $table->unsignedBigInteger('day_id'); // Id dia en que se imparte la materia
            $table->time('start'); // Inicio materia hs.
            $table->time('finish'); // Fin materia hs.
            $table->time('stop'); // Limite de tiempo para marcar asistencia.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cofigs');
    }
};
