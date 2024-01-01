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
        Schema::create('acproblems', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ruangans')->nullable();
            $table->string('jenis_ac')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('kerusakan')->nullable();
            $table->string('penanganan')->nullable();
            $table->string('paraf_teknis')->nullable();
            $table->string('paraf_maka_humsas')->nullable();
            $table->string('paraf_kepala_sekolah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acproblems');
    }
};
