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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('problema');
            $table->unsignedBigInteger('id_marca');
            $table->unsignedBigInteger('id_cliente');
            $table->timestamps();

            $table->foreign('id_marca')->references('id')->on('brands');
            $table->foreign('id_cliente')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};