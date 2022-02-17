<?php

namespace Database\Factories;

use App\Models\TypeIntervention;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeInterventionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TypeIntervention::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nomType' => $this->faker->text(20),
            'description' => $this->faker->sentence(5, true)
        ];
    }
}
