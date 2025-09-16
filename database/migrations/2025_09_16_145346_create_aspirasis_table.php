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
        Schema::create('aspirasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('phone')->nullable();
            $table->foreignId('kategori_id')->constrained();
            $table->foreignId('anggotadprd')->constrained('anggotadprds');
            $table->string('judul');
            $table->text('isi');
            $table->date('tanggal');
            $table->foreignId('kecamatan_id')->constrained('kecamatans');
            $table->foreignId('desa_id')->constrained('desas');
            $table->string('lampiran')->nullable();
            $table->enum('status', ['baru','terkirim','ditanggapi','selesai'])->default('baru');
            $table->text('tanggapan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirasis');
    }
};
