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
        Schema::create('competences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mapel_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('tingkat');
            $table->enum('semester', ['1', '2']);
            $table->string('code');
            $table->string('materi');
            $table->timestamps();
        });
        Schema::create('objectives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competence_id')->nullable()->constrained()->nullOnDelete();
            $table->string('capaian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competences');
    }
};
