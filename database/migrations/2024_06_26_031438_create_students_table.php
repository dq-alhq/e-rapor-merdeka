<?php

use App\Enums\ChildStatus;
use App\Enums\ParentJob;
use App\Enums\Religion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('nama');
            $table->string('nis')->unique();
            $table->string('nisn')->unique()->nullable();
            $table->string('nik')->unique()->nullable();
            $table->enum('gender', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat')->nullable();
            $table->foreignId('village_id')->nullable()->constrained()->nullOnDelete();
            $table->string('agama')->default(Religion::ISLAM->value);
            $table->integer('anak_ke')->nullable();
            $table->integer('status_anak')->default(ChildStatus::KANDUNG->value);
            $table->string('telepon')->nullable();
            $table->string('ayah');
            $table->integer('pekerjaan_ayah')->default(ParentJob::SWASTA->value);
            $table->string('ibu');
            $table->string('pekerjaan_ibu')->default(ParentJob::SWASTA->value);
            $table->string('wali')->nullable();
            $table->integer('pekerjaan_wali')->default(ParentJob::SWASTA->value);
            $table->string('photo')->nullable();
            $table->integer('tahun_masuk');
            $table->string('asal_sekolah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
