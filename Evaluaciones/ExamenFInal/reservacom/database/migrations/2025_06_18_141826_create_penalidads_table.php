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
        Schema::create('penalidads', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('reserva_id');
    $table->string('motivo');
    $table->timestamps();

    $table->foreign('reserva_id')->references('id')->on('reservas');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penalidads');
    }
};
