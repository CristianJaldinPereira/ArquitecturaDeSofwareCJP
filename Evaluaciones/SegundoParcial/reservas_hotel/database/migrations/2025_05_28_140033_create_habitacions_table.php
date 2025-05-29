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
        Schema::create('habitacions', function (Blueprint $table) {
            $table->id();
            $table->string('numero_habitacion')->unique();
            $table->unsignedBigInteger('tipo_habitacion_id');
            $table->decimal('precio_por_noche', 8, 2);
            $table->enum('estado', ['disponible', 'ocupado', 'mantenimiento'])->default('disponible');
            $table->text('descripcion')->nullable();
            $table->timestamps();

            $table->foreign('tipo_habitacion_id')->references('id')->on('tipohabitaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitacions');
    }
};



$table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();