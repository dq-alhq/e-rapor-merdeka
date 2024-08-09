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
        Schema::create('exculmembers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('excul_id')->constrained();
            $table->foreignId('classmember_id')->constrained();
            $table->timestamps();

            $table->unique(['excul_id', 'classmember_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exculmembers');
    }
};
