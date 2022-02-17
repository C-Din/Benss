<?php

namespace Database\Factories;

use App\Models\Infirmiere;
use App\Models\Patient;
use App\Models\Rdv;
use App\Models\TypeRdv;
use Illuminate\Database\Eloquent\Factories\Factory;

class RdvFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rdv::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dateSouhaite' => $this->faker->date(),
            'dateRdv' => $this->faker->date(),
            'heureSouhaite' => $this->faker->time(),
            'heureRdv' => $this->faker->time(),
            'type_Rdv_id' => TypeRdv::all()->random()->id,
            'inf_id' => Infirmiere::all()->random()->id,
            'patient_id' => Patient::all()->random()->id
        ];
    }
}
