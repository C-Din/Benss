<?php

namespace Database\Factories;

use App\Models\Infirmiere;
use App\Models\InfirmiereIntervention;
use App\Models\Intervention;
use Illuminate\Database\Eloquent\Factories\Factory;

class InfirmiereInterventionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InfirmiereIntervention::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'inf_id' => Infirmiere::all()->random()->id,
            'Intervention_id' => Intervention::all()->random()->id
        ];
    }
}
