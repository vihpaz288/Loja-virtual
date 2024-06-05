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
        Schema::create('produtoCarrinho', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produtoId')->constrained('produto');
            $table->foreignId('carrinhoId')->constrained('carrinho')->onDelete('cascade');
            $table->integer('quantidade');
            $table->string('valor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
