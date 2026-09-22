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
        Schema::create('table_produtos', function (Blueprint $table) {
=======
        Schema::create('produtos', function (Blueprint $table) {
>>>>>>> 89fbab5 (feat: ajusta rotas, banco de dados sqlite e assets do modulo de categorias)
            $table->id();
            $table->string('nome',100);
            $table->decimal('preco',10,2);
            $table->integer('quantidade')->default(0);
            $table->text('descricao')->nullable();
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->foreignId('marca_id')->constrained('marcas');
            $table->foreignId('fornecedor_id')->constrained('fornecedores');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_produtos');
    }
};
