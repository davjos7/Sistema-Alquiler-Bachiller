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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cuarto_id')->constrained('cuartos'); // Relación con cuartos
            $table->date('fecha_inicio');   // Fecha de inicio de la reserva
            $table->date('fecha_fin');      // Fecha de fin de la reserva
            $table->decimal('monto_total', 8, 2); // Monto total de la reserva
            $table->boolean('estado')->default(true); // Estado de la reserva (activa o cancelada)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
