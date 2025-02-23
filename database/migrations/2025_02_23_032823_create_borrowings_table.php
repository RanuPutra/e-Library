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
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('name_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('judul_id')->constrained('books')->onDelete('cascade');
            $table->date('tgl_peminjaman');
            $table->date('tgl_pengembalian')->nullable();
            $table->enum('status' ,['dipinjam' ,'dikembalikan', 'terlambat']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};
