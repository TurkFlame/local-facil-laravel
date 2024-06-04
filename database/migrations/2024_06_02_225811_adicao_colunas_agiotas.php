<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Essa migration adiciona as colunas telefone, email e idade na tabela "agiotas"
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('agiotas', function (Blueprint $table) {
            // Adiciona a coluna 'telefone' como uma string
            $table->string('telefone')->nullable();
            
            // Adiciona a coluna 'email' como uma string
            $table->string('email')->nullable();
            
            // Adiciona a coluna 'idade' como um inteiro
            $table->integer('idade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('agiotas', function (Blueprint $table) {
            // Remove as colunas adicionadas na função up() caso seja necessário reverter a migração
            $table->dropColumn('telefone');
            $table->dropColumn('email');
            $table->dropColumn('idade');
        });
    }
};
