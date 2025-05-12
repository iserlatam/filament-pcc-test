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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->enum('doc_tipo', ["ti","cc","ce","pasaporte"]);
            $table->string('doc_numero');
            $table->date('fecha_de_nacimiento');
            $table->string('direccion');
            $table->foreignId('sede_id');
            $table->foreignId('empresa_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
