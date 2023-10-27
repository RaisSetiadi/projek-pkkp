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
        Schema::create('minumen', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('foto_depan');
            $table->string('foto_belakang');
            $table->string('nama_produk');
            $table->integer('harga');
            $table->string('stok');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('minumen');
    }
};
