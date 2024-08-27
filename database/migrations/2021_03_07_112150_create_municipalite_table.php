<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipaliteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipalites', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_gouvernorat')->nullable()->index('id_gouvernorat');
            $table->foreign('id_gouvernorat')->references('id')->on('gouvernorats')->onDelete('cascade');
            $table->integer('id_commune')->nullable()->index('id_commune');
            $table->longText('nom_municipalite_fr')->nullable();
            $table->longText('nom_municipalite_ar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipalites');
    }
}
