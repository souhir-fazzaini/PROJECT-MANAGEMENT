<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_gouvernorat')->nullable()->index('id_gouvernorat');
            $table->foreign('id_gouvernorat')->references('id')->on('gouvernorats')->onDelete('cascade');

            $table->integer('rang_projet')->nullable();
            $table->integer('id_commune')->nullable()->index('id_commune');
            $table->foreign('id_commune')->references('id')->on('communes')->onDelete('cascade');
            $table->integer('id_municipalite')->nullable()->index('id_municipalite');
            $table->foreign('id_municipalite')->references('id')->on('municipalites')->onDelete('cascade');
            $table->integer('nombre_quartier')->nullable();
            $table->integer('nombre_maison')->nullable();
            $table->integer('nombre_habitant')->nullable();
            $table->integer('superficie_quartiers')->nullable();
            $table->integer('superficie_quartiers_couvert')->nullable();
            $table->integer('rapport_superificie')->nullable();
            $table->integer('taux_habitation')->nullable();
            $table->integer('rapport_depense_maison')->nullable();
            $table->longText('composante_projet')->nullable();
            $table->float('assainissement_qte', 20, 3)->nullable();
            $table->integer('assainissement_cout')->nullable();
            $table->integer('assainissement_taux')->nullable();
            $table->integer('eclairage_public_qte')->nullable();
            $table->integer('eclairage_public_cout')->nullable();
            $table->integer('eclairage_public_taux')->nullable();
            $table->float('voirie_qte', 20, 3)->nullable();
            $table->integer('voirie_cout')->nullable();
            $table->integer('voirie_taux')->nullable();
            $table->float('eau_potable_qte', 20, 3)->nullable();
            $table->integer('eau_potable_cout')->nullable();
            $table->integer('eau_potable_taux')->nullable();
            $table->float('drainage_qte', 20, 3)->nullable();
            $table->integer('drainage_cout')->nullable();
            $table->integer('drainage_taux')->nullable();
            $table->integer('amel_habitat_qte')->nullable();
            $table->integer('amel_habitat_cout')->nullable();
            $table->integer('socio_collectif_cout')->nullable();
            $table->integer('industriel_cout')->nullable();
            $table->integer('cout_total')->nullable();
            $table->string('type', 30);
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projets');
    }
}
