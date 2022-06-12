<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiLaundriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_laundry', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->foreignId('express_id');
            $table->foreignId('extend_id');
            $table->foreignId('setrika_id');
            $table->integer('berat');
            $table->integer('total_bayar');
            $table->integer('status');
            $table->dateTime('tanggal_diterima');
            $table->dateTime('tanggal_diambil');
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
        Schema::dropIfExists('transaksi_laundries');
    }
}
