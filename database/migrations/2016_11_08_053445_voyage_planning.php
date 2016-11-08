<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VoyagePlanning extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voyages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_rute')->unsigned();
            $table->dateTime('keberangkatan');
            $table->integer('eksekutif');
            $table->integer('bisnis');
            $table->integer('ekonomi1');
            $table->integer('ekonomi2');
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
        Schema::drop('voyages');
    }
}
