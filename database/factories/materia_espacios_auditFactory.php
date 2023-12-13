<?php

namespace Database\Factories;

use App\Models\materia_espacios_audit;
use Illuminate\Database\Eloquent\Factories\Factory;

class materia_espacios_auditFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = materia_espacios_audit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'campo' => $this->faker->word,
        'antiguo_valor' => $this->faker->word,
        'nuevo_valor' => $this->faker->word,
        'fecha' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
