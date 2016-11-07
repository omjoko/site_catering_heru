<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InvoicesDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_invoices', function (Blueprint $table) {
            $table->integer('id');
            $table->string('nama_barang');
            $table->integer('harga');
            $table->string('satuan');
            $table->integer('banyak');
            $table->integer('total');
            $table->integer('id_invoices');
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
        Schema::drop('detail_invoices');
    }
}
