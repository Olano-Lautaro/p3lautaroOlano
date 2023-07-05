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
        Schema::create('assists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id'); // Id Alumno
            $table->unsignedBigInteger('subject_id'); // Id Materia
            $table->unsignedBigInteger('day_id');   // Id Día 
            $table->date('date')->format('d-m-Y');
            $table->time('hour')->format('H:00:00');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assists');
    }
};
