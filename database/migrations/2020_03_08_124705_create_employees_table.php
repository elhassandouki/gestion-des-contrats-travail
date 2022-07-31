<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cin');
            $table->string('prenom');
            $table->string('nom');
            $table->date('ddn');
            $table->string('lieu');
            $table->date('date_validite_cin');
            $table->text('adresse');
            $table->string('sexe');
            $table->string('situation_familiale');
            $table->string('ville');
            $table->string('nombre_enfants');
            $table->string('nationalite');
            $table->date('date_entree');
            $table->string('numero_cnss');
            $table->string('rib');
            $table->string('telephone');
            $table->string('personee_acontact');
            $table->string('equipe');
            $table->string('transporteur');
            $table->string('region');
            $table->string('Ville_2');
            $table->string('pays');
            $table->string('adresse_actuelle');
            $table->string('fonction');
            $table->string('categorie_professionnelle');
            $table->string('departement');
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
        Schema::dropIfExists('employees');
    }
}
