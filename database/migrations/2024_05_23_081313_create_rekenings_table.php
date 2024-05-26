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
        Schema::create('rekenings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan');
            $table->string('no_rekening');
            $table->string('saldo');
            $table->string('pin');
            $table->timestamps();
        
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans')->onDelete('cascade');
            
            $table->index(['id_pelanggan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekenings');
    }
};
