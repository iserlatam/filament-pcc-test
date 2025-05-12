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
            $table->uuid('id');
            $table->string('codigo');
            $table->boolean('vencimiento')->nullable()->default(false);
            $table->date('fecha_vencimiento')->nullable();
            $table->text('observaciones')->nullable();
            $table->enum('estado', ["aprobado","reprobado","revision","aplazado"])->default('revision')->nullable();
            $table->foreignId('curso_id');
            $table->foreignId('estudiante_id');
            $table->foreignId('sede_id');
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
