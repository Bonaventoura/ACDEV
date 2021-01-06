<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('type_id');
            $table->integer('etat_id');
            $table->integer('partenaire_id')->nullable();
            $table->string('titre')->unique();
            $table->string('localite')->nullable();
            $table->string('beneficiaires');
            $table->text('objectifs')->nullable();
            $table->text('resultats')->nullable();
            $table->text('description')->nullable();
            $table->double('cout_projet')->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->text('image');
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
        Schema::dropIfExists('projets');
    }
}
