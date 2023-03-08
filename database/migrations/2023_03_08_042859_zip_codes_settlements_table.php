<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ZipCodesSettlementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip_code_settlements', function (Blueprint $table) {
            $table->unsignedBigInteger('zip_code_id');
            $table->foreign('zip_code_id')->references('id')->on('zip_codes')->onDelete('cascade');
            $table->unsignedBigInteger('settlement_id');
            $table->foreign('settlement_id')->references('id')->on('settlements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zip_code_settlements');
    }
}
