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
        Schema::create('agiotas', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nome');
            $table->text('url');
            $table->integer('mortes');
            $table->integer('emprestimo');
            $table->boolean('procurado');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agiotas');
    }
};
