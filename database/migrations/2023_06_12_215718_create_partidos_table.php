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
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipo_local_id');
            $table->integer('equipo_local_goles')->nullable();
            $table->unsignedBigInteger('equipo_visitante_id');
            $table->integer('equipo_visitante_goles')->nullable();
            $table->unsignedBigInteger('arbitro_id');
            $table->date('fecha');
            $table->boolean('finalizado')->default(false);
            $table->foreign('equipo_local_id')->references('id')->on('equipos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('equipo_visitante_id')->references('id')->on('equipos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('arbitro_id')->references('id')->on('arbitros')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidos');
    }
};
