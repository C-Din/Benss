<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFicheMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiche_medicals', function (Blueprint $table) {
            $table->id();
            $table->double('poids', 8, 2);
            $table->double('tension', 8, 2);
            $table->double('taille', 8, 2);
            $table->string('groupe_sanguin');
            $table->string('musculo_squelettiqu');
            $table->string('genito_urinaire');
            $table->string('neurologie');
            $table->string('dermo');
            $table->string('tyng');
            $table->string('psycatrique');
            $table->string('blessure');
            $table->string('gastro');
            $table->string('respiratoire');
            $table->string('endoctrinien');
            $table->string('coeur');
            $table->string('symtome');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('inf_id')->nullable();
            $table->unsignedSmallInteger('isDel')->default(0);
            $table->timestamps();
        });

        Schema::table('fiche_medicals', function(Blueprint $table){
            $table->foreign('patient_id')->references('id')
                                         ->on('patients')
                                         ->onDelete('restrict')
                                         ->onUpdate('restrict');
            $table->foreign('inf_id')->references('id')
                                     ->on('infirmieres')
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
        Schema::dropIfExists('fiche_medicals');
    }
}
