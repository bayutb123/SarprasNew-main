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
        Schema::create('inventory_ac', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ruangans')->nullable();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->integer('pk')->default(0);
            $table->date('production_year')->nullable();
            $table->date('bought_year')->nullable();
            $table->unsignedBigInteger('author');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('author')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_ac');
    }
};
