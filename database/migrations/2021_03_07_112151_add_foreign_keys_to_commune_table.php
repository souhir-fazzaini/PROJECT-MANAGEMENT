<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCommuneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commune', function (Blueprint $table) {
            $table->foreign('id_gouvernorat', 'commune_ibfk_1')->references('id')->on('gouvernorat')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('communes', function (Blueprint $table) {
            $table->dropForeign('communes_ibfk_1');
        });
    }
}
