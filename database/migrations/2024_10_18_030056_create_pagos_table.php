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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios');  // Relación con la tabla usuarios
            $table->foreignId('cuarto_id')->constrained('cuartos');  // Relación con la tabla cuartos
            $table->decimal('monto', 8, 2);  // Monto del pago
            $table->date('fecha_pago');  // Fecha en que se realizó el pago
            $table->string('metodo_pago');  // Método de pago (ej: tarjeta, transferencia)
            $table->boolean('estado')->default(true);  // Estado del pago (pagado o no)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
