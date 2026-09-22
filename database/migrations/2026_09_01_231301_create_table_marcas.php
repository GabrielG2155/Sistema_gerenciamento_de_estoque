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
<<<<<<< HEAD
        Schema::create('table_marcas', function (Blueprint $table) {
=======
        Schema::create('marcas', function (Blueprint $table) {
>>>>>>> 89fbab5 (feat: ajusta rotas, banco de dados sqlite e assets do modulo de categorias)
            $table->id();
            $table->string('nome',100);
            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_marcas');
    }
};
