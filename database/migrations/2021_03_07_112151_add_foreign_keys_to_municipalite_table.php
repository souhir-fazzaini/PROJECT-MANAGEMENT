<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMunicipaliteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('municipalites', function (Blueprint $table) {
            $table->foreign('id_gouvernorat', 'municipalites_ibfk_1')->references('id')->on('gouvernorats')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_commune', 'municipalites_ibfk_2')->references('id')->on('communes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('municipalites', function (Blueprint $table) {
            $table->dropForeign('municipalites_ibfk_1');
            $table->dropForeign('municipalites_ibfk_2');
        });
    }
}
