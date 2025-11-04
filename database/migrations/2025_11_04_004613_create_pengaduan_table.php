<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
            Schema::create('pengaduan', function (Blueprint $table) {
            $table->char('id', 36)->primary()->collation('utf8mb4_general_ci');
            $table->char('mahasiswa_id', 36)->collation('utf8mb4_general_ci');
            $table->string('judul_pengaduan');
            $table->text('isi_pengaduan');
            $table->enum('status', ['Pending', 'Diproses', 'Selesai'])->default('Pending');
            $table->text('tanggapan')->nullable();
            $table->timestamps();

            $table->foreign('mahasiswa_id')
                ->references('id')
                ->on('mahasiswa')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

    }

    /**
     * Batalkan migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
