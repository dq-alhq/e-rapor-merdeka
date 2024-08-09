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
        Schema::create('tapels', function (Blueprint $table) {
            $table->id();
            $table->integer('tapel');
            $table->enum('semester', ['1', '2']);
            $table->date('tanggal_rapor')->nullable();
            $table->string('tempat_rapor')->nullable();
            $table->timestamps();

            $table->unique(['tapel', 'semester']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tapels');
    }
};
