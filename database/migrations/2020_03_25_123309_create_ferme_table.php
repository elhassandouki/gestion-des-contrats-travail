<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFermeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ferme', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ferme');
            $table->integer('n_ferme');
            $table->string('color_ferme');
            $table->string('admin_ferme');
            $table->string('gerant_ferme');
            $table->string('adresse');
            $table->string('user_add');
            $table->string('user_update');
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
        Schema::dropIfExists('ferme');
    }
}
