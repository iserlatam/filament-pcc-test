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
        Schema::create('certificados', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->boolean('vencimiento')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->string('dpto');
            $table->string('ciudad');
            $table->text('observaciones');
            $table->enum('estado', ["aprobado","reprobado","pendiente","aplazado"]);
            $table->foreignId('curso_id');
            $table->foreignId('estudiante_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificados');
    }
};
