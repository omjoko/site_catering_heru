<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Wastes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wastes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_sampah');
            $table->integer('jenis_sampah');
            $table->integer('berat');
            $table->integer('id_voyages');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('wastes');
    }
}
