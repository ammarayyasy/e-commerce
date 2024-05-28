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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kategori');
            $table->string('name');
            $table->string('harga');
            $table->text('deskripsi');
            $table->string('stok');
            $table->string('image')->nullable();
            $table->timestamps();
        
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade');
        
            $table->index(['id_kategori']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
