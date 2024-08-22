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
        Schema::create('dimensions', function (Blueprint $table) {
            $table->id();
            $table->string('jenjang');
            $table->string('deskripsi');
            $table->timestamps();
        });

        Schema::create('elements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dimension_id')->constrained('dimensions');
            $table->string('deskripsi');
            $table->timestamps();
        });

        Schema::create('subelements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('element_id')->constrained('elements');
            $table->string('deskripsi');
            $table->timestamps();
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tapel_id')->constrained();
            $table->integer('tema');
            $table->string('kegiatan');
            $table->text('deskripsi')->nullable();
            $table->foreignId('subelement_1')->nullable()->constrained('subelements')->nullOnDelete();
            $table->foreignId('subelement_2')->nullable()->constrained('subelements')->nullOnDelete();
            $table->foreignId('subelement_3')->nullable()->constrained('subelements')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
