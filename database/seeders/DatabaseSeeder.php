<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\TypeIntervention::factory(10)->create();
        \App\Models\Intervention::factory(30)->create();
        \App\Models\TypeRdv::factory(10)->create();
        \App\Models\MedecinIntervention::factory(10)->create();
        \App\Models\InfirmiereIntervention::factory(10)->create();
        \App\Models\TypeRdv::factory(10)->create();
        \App\Models\Rdv::factory(10)->create();
        \App\Models\Resultat::factory(60)->create();
        \App\Models\Ordonnance::factory(20)->create();
        \App\Models\FicheMedical::factory(10)->create();

    }
}
