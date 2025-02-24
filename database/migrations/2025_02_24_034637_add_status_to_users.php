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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('status_dalam_keluarga', ['AYAH', 'IBU', 'ANAK', 'LAINNYA'])->nullable()->default('AYAH')->after('jumlah_anggota_keluarga');
            $table->enum('baptis', ['Y', 'N'])->nullable()->after('status_dalam_keluarga');
            $table->date('tanggal_baptis')->nullable()->after('baptis');
            $table->date('tanggal_mikah')->nullable()->after('status_perkawinan');
            $table->enum('sidi', ['Y', 'N'])->nullable()->after('tanggal_baptis');
            $table->enum('janda_duda', ['Y', 'N'])->nullable()->after('sidi');
            $table->enum('yatim', ['Y', 'N'])->nullable()->after('janda_duda');
            $table->string('penghasilan')->nullable()->after('pekerjaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
