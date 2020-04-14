<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhotoToBiodataMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biodata_mahasiswa', function (Blueprint $table) {
            
            $table->string("photo"); //menambahkan kolom photo pada tabel

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('biodata_mahasiswa', function (Blueprint $table) {
        //     //
        // });
    }
}
