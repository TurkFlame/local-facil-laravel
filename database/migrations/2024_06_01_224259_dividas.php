<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_dividas', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('agiota_id');
            $table->integer('valor_total');
            $table->integer('quantidade_parcelas');
            $table->integer('juros');
            $table->date('data_pagamento');
            $table->foreign('user_id')->references('id')->on('usuarios');
            $table->foreign('agiota_id')->references('id')->on('agiotas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_dividas');
    }
};
