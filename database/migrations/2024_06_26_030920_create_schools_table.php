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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenjang');
            $table->string('npsn');
            $table->string('nss')->nullable();
            $table->string('nds')->nullable();
            $table->string('nis')->nullable();
            $table->string('alamat');
            $table->foreignId('village_id')->nullable()->constrained()->nullOnDelete();
            $table->string('kode_pos');
            $table->string('telepon')->nullable();
            $table->string('logo')->nullable();
            $table->foreignId('kepsek_id')->nullable()->constrained('teachers')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school');
    }
};
