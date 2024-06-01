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
        Schema::create('agiota_notas', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('agiota_id');
            $table->integer('nota')->nullable()->default(null);
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
        Schema::dropIfExists('agiota_notas');
    }
};
