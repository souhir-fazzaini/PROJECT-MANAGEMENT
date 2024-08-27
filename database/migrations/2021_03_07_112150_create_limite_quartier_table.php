<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLimiteQuartierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('limite_quartier', function (Blueprint $table) {
            $table->integer('id_limite_quartier', true);
            $table->integer('id_quartier')->nullable()->index('id_quartier');
            $table->foreign('id_quartier')->references('id')->on('quartiers')->onDelete('cascade');
            $table->float('lat_1', 10, 6);
            $table->float('lng_1', 10, 6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('limite_quartier');
    }
}
