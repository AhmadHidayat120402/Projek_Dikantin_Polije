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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_penjualan');
            $table->integer('nomer_penjualan');
            $table->integer('id_customer');
            $table->integer('id_kasir');
            $table->integer('subtotal');
            $table->float('diskon')->nullable();
            $table->integer('total');
            $table->integer('bayar');
            $table->enum('model_pembayaran', ['cash', 'gopay', 'qris', 'polijepay', 'transfer bank']);
            $table->integer('kembalian');
            $table->integer('no_meja');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
