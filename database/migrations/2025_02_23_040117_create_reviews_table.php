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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('name_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('judul_id')->constrained('books')->onDelete('cascade');
            $table->enum('rating' ,['1' ,'2' ,'3' ,'4' ,'5']);
            $table->text('ulasan');
            $table->date('tgl_ulasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
