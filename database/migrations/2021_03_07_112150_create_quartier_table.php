<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuartiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quartiers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_projet')->nullable()->index('id_projet');
            $table->foreign('id_projet')->references('id')->on('projets')->onDelete('cascade');
            $table->string('nom', 1000)->nullable();
            $table->float('lat', 10, 6);
            $table->float('lng', 10, 6);
            $table->string('image', 30);
         
        });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quartiers');
    }
}
