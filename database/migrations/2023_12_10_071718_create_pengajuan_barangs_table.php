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
        Schema::create('pengajuan_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('banyak_barang')->nullable();
            $table->string('harga_satuan')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('lapor_kapsek')->nullable();
            $table->string('lapor_yayasan')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_barangs');
    }
};
