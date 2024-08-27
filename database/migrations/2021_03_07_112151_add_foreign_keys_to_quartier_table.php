<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToQuartierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quartiers', function (Blueprint $table) {
            $table->foreign('id_projet', 'quartiers_ibfk_1')->references('id')->on('projets')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quartiers', function (Blueprint $table) {
            $table->dropForeign('quartiers_ibfk_1');
        });
    }
}
