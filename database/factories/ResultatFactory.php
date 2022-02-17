<?php

namespace Database\Factories;

use App\Models\Intervention;
use App\Models\Resultat;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResultatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resultat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'commentaire' => $this->faker->sentence(15, true),
            'intervention_id' => Intervention::all()->random()->id
        ];
    }
}
