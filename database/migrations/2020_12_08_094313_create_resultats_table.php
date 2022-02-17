<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultats', function (Blueprint $table) {
            $table->id();
            $table->text('commentaire');
            $table->text('prescription');
            $table->unsignedBigInteger('intervention_id')->nullable();
            $table->unsignedBigInteger('rdv_id')->nullable();
            $table->unsignedSmallInteger('isDel')->default(0);
            $table->timestamps();
        });

        Schema::table('resultats', function(Blueprint $table){
            $table->foreign('rdv_id')->references('id')
                                     ->on('rdvs')
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
        Schema::dropIfExists('resultats');
    }
}
