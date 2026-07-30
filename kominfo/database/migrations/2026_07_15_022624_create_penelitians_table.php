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
        Schema::create('penelitians', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number')->unique();
            $table->string('nama_lengkap');
            $table->string('no_telepon');
            $table->string('email');
            $table->string('instansi');
            $table->string('judul_penelitian');
            $table->string('lokasi_penelitian');
            $table->string('bidang_tujuan');
            $table->string('surat_penelitian_path');
            $table->string('surat_kesbangpol_path')->nullable();
            $table->string('status')->default('Pending'); // e.g. Pending, Disetujui, Ditolak
            $table->string('jurnal_path')->nullable();
            $table->string('jurnal_link')->nullable();
            $table->string('jurnal_status')->default('Pending'); // e.g. Pending, Terverifikasi, Ditolak
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penelitians');
    }
};
