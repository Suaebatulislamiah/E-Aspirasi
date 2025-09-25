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
            $table->enum('jabatan', ['Ketua DPRD', 'Wakil Ketua I', 'Wakil Ketua II', 'Wakil Ketua III', 'Anggota DPRD']);
            $table->enum('komisi', ['Komisi I', 'Komisi II', 'Komisi III', 'Komisi IV']);
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
