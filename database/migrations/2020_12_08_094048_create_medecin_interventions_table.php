<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedecinInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medecin_interventions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('med_id');
            $table->unsignedBigInteger('intervention_id');
            $table->unsignedSmallInteger('isDel')->default(0);
            $table->timestamps();
        });

        Schema::table('medecin_interventions', function(Blueprint $table){
            $table->foreign('med_id')->references('id')
                                     ->on('medecins')
                                     ->onDelete('restrict')
                                     ->onUpdate('restrict');
            $table->foreign('intervention_id')->references('id')
                                              ->on('interventions')
                                              ->onDelete('restrict')
                                              ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medecin_interventions');
    }
}
