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
        Schema::create('excel', function (Blueprint $table) {
            $table->id();
            $table->string('tiempo');
            $table->string('nombre');
            $table->string('id_trabajador');
            $table->string('codigo_pago')->nullable();
            $table->string('estado_trabajo');
            $table->string('nombre_terminal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excel');
    }
};
