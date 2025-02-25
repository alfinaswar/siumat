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
        Schema::create('profil_stasis', function (Blueprint $table) {
            $table->id();
            $table->string('idKub')->nullable();
            $table->string('idStasi')->nullable();
            $table->string('Nama');
            $table->string('Jabatan')->nullable();
            $table->enum('Gender', ['L', 'P'])->nullable();
            $table->string('Periode', 200)->nullable();
            $table->string('Alamat')->nullable();
            $table->string('NoTelp', 15)->nullable();
            $table->string('Email')->nullable();
            $table->text('Deskripsi')->nullable();
            $table->string('FotoProfil')->nullable();
            $table->string('KUB')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_stasis');
    }
};
