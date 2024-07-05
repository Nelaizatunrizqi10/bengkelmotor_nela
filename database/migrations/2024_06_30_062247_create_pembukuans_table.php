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
        Schema::create('pembukuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_servis')->referencec('id')->on('servis')->onDelete('cascade');
            $table->foreignId('id_akuns')->referencec('id')->on('akuns')->onDelete('cascade');
            $table->double('saldo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembukuans');
    }
};
