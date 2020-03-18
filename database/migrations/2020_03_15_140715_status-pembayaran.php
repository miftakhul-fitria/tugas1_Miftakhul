<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StatusPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status-pembayaran', function (Blueprint $table) {
            $table->string('id',40);
            $table->string('nama',115);
            $table->timestamps();

            $table->primary('id');
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
        Schema::table('status-pembayaran', function (Blueprint $table) {
            //
        });
    }
}
