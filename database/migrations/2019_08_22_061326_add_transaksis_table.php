<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_barang');
            $table->unsignedInteger('id_konsumen');
            $table->unsignedInteger('id_admin');
            $table->date('tgl_transaksi');
            $table->timestamps();
        });

        Schema::table('transaksis', function (Blueprint $table) {
            $table->foreign('kode_barang')->references('kode_barang')->on('barangs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_konsumen')->references('id')->on('konsumens')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_admin')->references('id')->on('admins')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
