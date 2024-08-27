<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommuneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_gouvernorat')->nullable()->index('id_gouvernorat');
            $table->foreign('id_gouvernorat')->references('id')->on('gouvernorats')->onDelete('cascade');
            $table->longText('nom_commune_fr')->nullable();
            $table->longText('nom_commune_ar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('communes');
    }
}
