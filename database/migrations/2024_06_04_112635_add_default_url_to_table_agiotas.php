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
        Schema::table('agiotas', function (Blueprint $table) {
            $table->string('url')->default('https://i.ibb.co/RCYBZzs/download.png')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agiotas', function (Blueprint $table) {
            //
        });
    }
};
