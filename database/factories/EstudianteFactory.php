<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Curso;
use App\Models\Estudiante;

class EstudianteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estudiante::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(),
            'apellidos' => $this->faker->word(),
            'doc_tipo' => $this->faker->randomElement(["ti","cc","ce","pasaporte"]),
            'doc_numero' => $this->faker->numberBetween(-10000, 10000),
            'fecha_de_nacimiento' => $this->faker->date(),
            'direccion' => $this->faker->word(),
            'curso_id' => Curso::factory(),
        ];
    }
}
