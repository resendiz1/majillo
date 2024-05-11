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
        Schema::create('divididos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->string('fecha');
            $table->string('hora');
            $table->string('id_trabajador');
            $table->string('estado');
            $table->string('terminal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('divididos');
    }
};
