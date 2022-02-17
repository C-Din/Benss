<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiement_interventions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paiement_id');
            $table->unsignedBigInteger('intervention_id');
            $table->double('sommeRecue', 8, 2);
            $table->unsignedSmallInteger('isDel')->default(0);
            $table->timestamps();
        });

        Schema::table('paiement_interventions', function(Blueprint $table){
            $table->foreign('paiement_id')->references('id')
                                          ->on('paiements')
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
        Schema::dropIfExists('paiement_interventions');
    }
}
