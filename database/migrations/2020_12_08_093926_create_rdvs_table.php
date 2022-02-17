<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdvs', function (Blueprint $table) {
            $table->id();
            $table->date('dateSouhaite');
            $table->date('dateRdv');
            $table->time('heureSouhaite');
            $table->time('heureRdv');
            $table->integer('etat')->default(0);
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('type_rdv_id');
            $table->unsignedBigInteger('inf_id')->nullable();
            $table->unsignedBigInteger('med_id')->nullable();
            $table->unsignedSmallInteger('isDel')->default(0);
            $table->timestamps();
        });

        Schema::table('rdvs', function(Blueprint $table){
            $table->foreign('patient_id')->references('id')
                                         ->on('patients')
                                         ->onDelete('restrict')
                                         ->onUpdate('restrict');
            $table->foreign('type_rdv_id')->references('id')
                                          ->on('type_rdvs')
                                          ->onDelete('restrict')
                                          ->onUpdate('restrict');
            $table->foreign('inf_id')->references('id')
                                     ->on('infirmieres')
                                     ->onDelete('restrict')
                                     ->onUpdate('restrict');
            $table->foreign('med_id')->references('id')
                                     ->on('medecins')
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
        Schema::dropIfExists('rdvs');
    }
}
