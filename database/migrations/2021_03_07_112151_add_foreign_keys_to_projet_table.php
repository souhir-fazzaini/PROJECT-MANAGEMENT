<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProjetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projets', function (Blueprint $table) {
            $table->foreign('id_commune', 'projets_ibfk_1')->references('id')->on('communes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_gouvernorat', 'projets_ibfk_2')->references('id')->on('gouvernorats')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_municipalite', 'projets_ibfk_3')->references('id')->on('municipalites')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projets', function (Blueprint $table) {
            $table->dropForeign('projets_ibfk_1');
            $table->dropForeign('projets_ibfk_2');
            $table->dropForeign('projets_ibfk_3');
        });
    }
}
