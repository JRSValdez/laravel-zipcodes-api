<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddingIndexesToZipCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('zip_codes', function (Blueprint $table) {
            $table->index(['code'], 'zip_codes_code_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zip_codes', function (Blueprint $table) {
            $table->dropIndex('zip_codes_code_index');
        });
    }
}
