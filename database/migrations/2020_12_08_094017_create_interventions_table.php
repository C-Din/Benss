<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->id();
            $table->date('dateIntervention');
            $table->time('heureIntervention');
            $table->string('commentaire');
            $table->unsignedBigInteger('patient_id');
            $table->integer('etat')->default(0);
            $table->unsignedBigInteger('type_intervention_id');
            $table->unsignedSmallInteger('isDel')->default(0);
            $table->timestamps();
        });

        Schema::table('interventions', function(Blueprint $table){
            $table->foreign('patient_id')->references('id')
                                         ->on('patients')
                                         ->onDelete('restrict')
                                         ->onUpdate('restrict');
            $table->foreign('type_intervention_id')->references('id')
                                                   ->on('type_interventions')
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
        Schema::dropIfExists('interventions');
    }
}
