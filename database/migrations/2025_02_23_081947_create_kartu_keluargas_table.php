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
        Schema::create('kartu_keluargas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kode_rayon')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('nama_kk')->nullable();
            $table->string('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('bentuk_rumah')->nullable();
            $table->string('status_rumah')->nullable();
            $table->string('kub')->nullable();
            $table->string('dibuat_oleh', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartu_keluargas');
    }
};
