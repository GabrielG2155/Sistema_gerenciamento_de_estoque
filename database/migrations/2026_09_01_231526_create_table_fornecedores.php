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
        Schema::create('table_fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->string('cnpj',18).unique();
=======
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->string('cnpj',18)->unique();
>>>>>>> 89fbab5 (feat: ajusta rotas, banco de dados sqlite e assets do modulo de categorias)
            $table->string('email',100);
            $table->string('telefone',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_fornecedores');
    }
};
