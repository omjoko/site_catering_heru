<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kapals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kapals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kapal');
            $table->tinyInteger('tipe_pembayaran');
            $table->string('no_imo');
            $table->string('kapasitas');
            $table->integer('id_penyimpanan');
            $table->tinyInteger('terhapus');
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
        Schema::drop('kapals');
    }
}
