<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('agiotas', function (Blueprint $table) {
            // Altera as colunas 'mortes', 'emprestimo' e 'procurado' para terem valores padrão
            $table->integer('mortes')->default(0)->change();
            $table->integer('emprestimo')->default(0)->change();
            $table->boolean('procurado')->default(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agiotas', function (Blueprint $table) {
            // Remove os valores padrão das colunas 'mortes', 'emprestimo' e 'procurado'
            $table->integer('mortes')->default(null)->change();
            $table->integer('emprestimo')->default(null)->change();
            $table->boolean('procurado')->default(null)->change();
        });
    }
};
