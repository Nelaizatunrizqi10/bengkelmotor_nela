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
        Schema::create('servis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori')->referencec('id')->on('kategoris')->onDelete('cascade');
            $table->foreignId('id_profil')->referencec('id')->on('profiles')->onDelete('cascade');
            $table->foreignId('id_barang')->referencec('id')->on('barangs')->onDelete('cascade');
            $table->double('jumlah_bayar');
            $table->timestamp('tanggal_masuk');
            $table->timestamp('tanggal_selesai');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servis');
    }
};
