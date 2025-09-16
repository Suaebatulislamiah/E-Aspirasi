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
        Schema::create('anggotadprds', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jabatan', ['Ketua', 'Wakil Ketua', 'Anggota']);
            $table->enum('komisi', ['Komisi I', 'Komisi II', 'Komisi III', 'Komisi IV', 'Komisi V']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotadprds');
    }
};
