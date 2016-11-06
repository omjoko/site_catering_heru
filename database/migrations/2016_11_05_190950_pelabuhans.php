<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pelabuhans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelabuhans', function (Blueprint $table) {
            $table->increments('id_pelabuhan');
            $table->string('nama_pelabuhan');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('kota');
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
        Schema::drop('pelabuhans');
    }
}
