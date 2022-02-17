<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfirmiereInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infirmiere_interventions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inf_id');
            $table->unsignedBigInteger('intervention_id');
            $table->unsignedSmallInteger('isDel')->default(0);
            $table->timestamps();
        });

        Schema::table('infirmiere_interventions', function(Blueprint $table){
            $table->foreign('inf_id')->references('id')
                                     ->on('infirmieres')
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
        Schema::dropIfExists('infirmiere_interventions');
    }
}
