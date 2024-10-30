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
        Schema::create('cuartos', function (Blueprint $table) {
            $table->id('id_cuarto');
            $table->string('nombre_cuarto');              // Nombre o número del cuarto
            $table->text('descripcion_cuarto')->nullable(); // Descripción del cuarto
            $table->decimal('precio_cuarto', 8, 2);       // Precio mensual del cuarto
            $table->boolean('disponible_cuarto')->default(true); // Estado de disponibilidad
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuartos');
    }
};
