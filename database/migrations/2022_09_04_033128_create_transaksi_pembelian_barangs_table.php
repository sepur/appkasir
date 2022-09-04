<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiPembelianBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pembelian_barangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_pembelian_id');
            $table->foreign('transaksi_pembelian_id')->references('id')->on('transaksi_pembelians')->onDelete('cascade');
            $table->unsignedBigInteger('master_barang_id');
            $table->foreign('master_barang_id')->references('id')->on('master_barangs')->onDelete('cascade');
            $table->integer('jumlah');
            $table->float('harga_satuan');
            $table->float('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_pembelian_barangs');
    }
}
