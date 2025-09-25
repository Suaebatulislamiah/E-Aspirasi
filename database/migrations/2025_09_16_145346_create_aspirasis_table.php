<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aspirasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('phone')->nullable();
            $table->string('judul');
            $table->foreignId('kategori_id')->constrained('kategoris')->cascadeOnDelete();
            $table->foreignId('anggotadprd_id')->constrained('anggotadprds')->cascadeOnDelete();
            $table->text('isi');
            $table->date('tanggal');
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->cascadeOnDelete();
            $table->foreignId('desa_id')->constrained('desas')->cascadeOnDelete();
            $table->string('lampiran')->nullable();
            $table->enum('status', ['baru','terkirim','ditanggapi','selesai'])->default('baru');
            $table->text('tanggapan')->nullable();
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('aspirasis');
    }
};
