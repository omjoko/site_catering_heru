<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KelasMakan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas_makans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hari');
            $table->integer('eksekutif');
            $table->integer('bisnis');
            $table->integer('ekonomi');
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
        Schema::drop('kelas_makans');
    }
}
