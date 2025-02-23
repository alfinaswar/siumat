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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            // Informasi Pribadi
            $table->string('nik', 16)->unique()->nullable();
            $table->string('no_kk', 16)->nullable();  // Nomor Kartu Keluarga
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->integer('jumlah_anggota_keluarga')->nullable();
            $table->string('alamat')->nullable();
            $table->string('rt', 3)->nullable();
            $table->string('rw', 3)->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota_kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos', 10)->nullable();
            $table->string('nomor_telepon', 15)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('status_perkawinan')->nullable();  // Menikah, Belum Menikah, Duda/Janda
            $table->string('agama')->nullable();
            $table->string('suku')->nullable();

            // Pekerjaan dan Pendidikan
            $table->string('pekerjaan')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('instansi')->nullable();

            // Informasi Tambahan
            $table->string('kub', 100)->nullable();
            $table->string('role', 100)->default('user');
            $table->string('dibuat_oleh', 100)->nullable();
            $table->string('foto_profil')->nullable();
            $table->enum('status_akun', ['aktif', 'nonaktif', 'suspend'])->default('aktif');

            $table->timestamps();  // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
