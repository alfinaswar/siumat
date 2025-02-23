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
        Schema::create('master_majelis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kode_rayon')->nullable();
            $table->string('nama_majelis', 100)->nullable();
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->string('periode', 100)->nullable();
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
        Schema::dropIfExists('master_majelis');
    }
};
