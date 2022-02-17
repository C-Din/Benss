<?php

namespace Database\Factories;

use App\Models\FicheMedical;
use App\Models\Infirmiere;
use App\Models\Model;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class FicheMedicalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FicheMedical::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'poids' => $this->faker->numberBetween($min = 5, $max = 200),
            'taille' => $this->faker->numberBetween($min = 5, $max = 200),
            'tension' => $this->faker->numberBetween($min = 10, $max = 40),
            'poids' => $this->faker->numberBetween($min = 155, $max = 200),
            'groupe_sanguin' => $this->faker->word(),
            'musculo_squelettiqu' => $this->faker->word(),
            'genito_urinaire' => $this->faker->word(),
            'neurologie' => $this->faker->word(),
            'dermo' => $this->faker->word(),
            'tyng' => $this->faker->word(),
            'psycatrique' => $this->faker->word(),
            'blessure' => $this->faker->word(),
            'gastro' => $this->faker->word(),
            'respiratoire' => $this->faker->word(),
            'endoctrinien' => $this->faker->word(),
            'coeur' => $this->faker->word(),
            'symtome' => $this->faker->word(),
            'inf_id' => Infirmiere::all()->random()->id,
            'patient_id' => Patient::all()->random()->id
        ];
    }
}
