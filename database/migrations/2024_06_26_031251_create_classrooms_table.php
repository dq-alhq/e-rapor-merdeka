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
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tapel_id')->constrained();
            $table->foreignId('wali_id')->nullable()->constrained('teachers')->nullOnDelete();
            $table->integer('tingkat');
            $table->string('rombel')->nullable();
            $table->timestamps();

            $table->unique(['tingkat', 'rombel', 'tapel_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};
