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
        Schema::create('huespedes', function (Blueprint $table) {
            $table->id('id_huesped');
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->integer('telefono')->nullable();
            $table->integer('edad')->nullable();
            $table->integer('dni')->nullable();
            $table->decimal('garantia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('huespedes');
    }
};
