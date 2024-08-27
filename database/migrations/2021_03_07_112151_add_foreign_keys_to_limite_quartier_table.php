<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLimiteQuartierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('limite_quartier', function (Blueprint $table) {
            $table->foreign('id_quartier', 'limite_quartier_ibfk_1')->references('id')->on('quartiers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('limite_quartier', function (Blueprint $table) {
            $table->dropForeign('limite_quartier_ibfk_1');
        });
    }
}
