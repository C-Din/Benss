<?php

namespace Database\Factories;

use App\Models\Intervention;
use App\Models\Medecin;
use App\Models\MedecinIntervention;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedecinInterventionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MedecinIntervention::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'med_id' => Medecin::all()->random()->id,
            'Intervention_id' => Intervention::all()->random()->id
        ];
    }
}
