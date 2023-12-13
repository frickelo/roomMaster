<?php

namespace Database\Factories;

use App\Models\Materia_espacio;
use Illuminate\Database\Eloquent\Factories\Factory;

class Materia_espacioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Materia_espacio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dia_semana' => $this->faker->word,
        'hora_entrada' => $this->faker->word,
        'hora_salida' => $this->faker->word,
        'periodo' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
