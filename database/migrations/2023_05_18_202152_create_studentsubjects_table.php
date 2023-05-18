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
        Schema::create('studentsubjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Student_id');
            $table->unsignedBigInteger('Subject_id');
            // $table->primary(['Student_id','Subject_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentsubject');
    }
};
