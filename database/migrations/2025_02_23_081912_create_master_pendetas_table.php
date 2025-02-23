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
        Schema::create('master_pendetas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->unique()->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('jabatan')->nullable();
            $table->string('tahun_masuk')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('foto')->nullable();
            $table->boolean('status_aktif')->default(true);
            $table->string('kub', 100)->nullable();
            $table->string('dibuat_oleh', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_pendetas');
    }
};
