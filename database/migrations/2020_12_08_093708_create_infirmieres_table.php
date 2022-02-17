<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfirmieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infirmieres', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->date('dateNaiss');
            $table->string('lieuNaiss');
            $table->string('adresse')->nullable();
            $table->string('sexe');
            $table->string('telephone');
            $table->unsignedBigInteger('user_id');
            $table->unsignedSmallInteger('isDel')->default(0);
            $table->timestamps();
        });

        Schema::table('infirmieres', function(Blueprint $table){
            $table->foreign('user_id')->references('id')
                                      ->on('users')
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
        Schema::dropIfExists('infirmieres');
    }
}
