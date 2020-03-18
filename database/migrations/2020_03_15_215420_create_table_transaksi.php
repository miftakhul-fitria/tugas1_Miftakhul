<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pesanan', function (Blueprint $table) {
            $table->string('id',40);
            $table->string('customer',40);  //relasi dengan table customer
            $table->string('paket',40);
            $table->integer('berat');
            $table->integer('grand-total');
            $table->string('status-pesanan',40);
            $table->string('status-pembayaran',40);
            $table->timestamps();

            //Relasi table
            $table->primary('id');
            $table->foreign('customer')->references('id')->on('customer')->onDelete('restrict');
            $table->foreign('paket')->references('id')->on('paket')->onDelete('restrict');
            $table->foreign('status-pesanan')->references('id')->on('status-pesanan')->onDelete('restrict');
            $table->foreign('status-pembayaran')->references('id')->on('status-pembayaran')->onDelete('restrict');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_pesanan', function (Blueprint $table) {
            //
        });
    }
}
