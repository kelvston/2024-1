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
        Schema::table('majina_kuzaliwa', function (Blueprint $table) {
            $table->string('hospital')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('majina_kuzaliwa', function (Blueprint $table) {
            $table->string('hospital')->nullable();
        });
    }
};
