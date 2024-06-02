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
        Schema::disableForeignKeyConstraints();
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_recepcion');
            $table->string('estado_servicio');
            $table->text('diagnostico');
            $table->text('solucion')->nullable();
            $table->unsignedBigInteger('id_tecnico');
            $table->unsignedBigInteger('id_equipo');
            $table->timestamps();

            $table->foreign('id_tecnico')->references('id')->on('technicals');
            $table->foreign('id_equipo')->references('id')->on('equipment');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
