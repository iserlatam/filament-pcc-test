<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\;
use App\Models\Estudiante;
use App\Models\Sede;

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
            'nombre_completo' => $this->faker->word(),
            'doc_tipo' => $this->faker->randomElement(["ti","cc","ce","pasaporte"]),
            'doc_numero' => $this->faker->word(),
            'fecha_de_nacimiento' => $this->faker->date(),
            'direccion' => $this->faker->word(),
            'sede_id' => Sede::factory(),
            'empresa_id' => ::factory(),
        ];
    }
}
