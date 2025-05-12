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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('titulacion');
            $table->string('duracion');
            $table->double('valor');
            $table->enum('estado', ["abierto","lleno","cerrado"])->default('abierto')->nullable();
            $table->string('limite_estudiantes')->default('50')->nullable();
            $table->string('estudiantes')->default('0')->nullable();
            $table->foreignId('area_id');
            $table->foreignId('entrenador_id');
            $table->foreignId('nivel_id');
            $table->foreignId('cupon_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
