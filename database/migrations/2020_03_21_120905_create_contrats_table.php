<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cin_employee');
            $table->string('id_employee');
            $table->string('ferme');
            $table->date('date_embauche');
            $table->date('date_envoyer');
            $table->date('date_recu');
            $table->string('legalise');
            $table->string('dossier_valider');
            $table->string('cin_valider');
            $table->string('cnss_valider');
            $table->string('ficher_valider');
            $table->string('rib_valider');
            $table->date('date_fin_contrat');
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
        Schema::dropIfExists('contrats');
    }
}
