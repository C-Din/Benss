<?php

namespace Database\Factories;

use App\Models\Intervention;
use App\Models\Patient;
use App\Models\TypeIntervention;
use Illuminate\Database\Eloquent\Factories\Factory;

class InterventionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Intervention::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dateIntervention' => $this->faker->date(),
            'heureIntervention' => $this->faker->time(),
            'commentaire' => $this->faker->sentence(15, true),
            'type_intervention_id' => TypeIntervention::all()->random()->id,
            'patient_id' => Patient::all()->random()->id
        ];
    }
}
