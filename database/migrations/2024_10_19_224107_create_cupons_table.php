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
        Schema::create('cupons', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('nombre')->nullable()->unique();
            $table->enum('estado', ["activo","inactivo"])->default('inactivo')->nullable();
            $table->string('total_desc');
            $table->enum('tipo_desc', ["fijo","porcentaje"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cupons');
    }
};
