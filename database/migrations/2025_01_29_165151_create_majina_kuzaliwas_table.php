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
        Schema::create('majina_kuzaliwa', function (Blueprint $table) {
                $table->id();
                $table->integer('user_id');
                $table->string('name');
                $table->string('address');
                $table->string('religion');
                $table->string('occupation');
                $table->string('birthCategory');
                $table->string('birthWitness');
                $table->string('signature'); // Path to file
                $table->date('date');
                $table->string('witnessName')->nullable(); // Optional field for witness name
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('majina_kuzaliwas');
    }
};
