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
        Schema::create('tindak_lanjut_saranas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ruangans')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('kerusakan')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('lapor_kapsek')->nullable();
            $table->string('lapor_yayasan')->nullable();
            $table->string('tanggal_perbaikan')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tindak_lanjut_saranas');
    }
};
