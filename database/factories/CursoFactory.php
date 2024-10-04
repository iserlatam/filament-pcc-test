<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\;
use App\Models\Curso;
use App\Models\Nivel;

class CursoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Curso::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nivel_id' => Nivel::factory(),
            'duracion' => $this->faker->word(),
            'valor' => $this->faker->randomFloat(0, 0, 9999999999.),
            'estado' => $this->faker->randomElement(["abierto","lleno","cerrado"]),
            'codigo' => $this->faker->word(),
            'area_id' => ::factory(),
        ];
    }
}
