<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('tanggal');
            $table->integer('user_id');
            $table->decimal('total', 10);
            $table->integer('pelanggan_id');
            $table->string('nomor_nota', 100)->unique('penjualan_UN');
            $table->decimal('bayar', 10);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
