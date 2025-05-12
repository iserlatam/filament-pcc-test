<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cupon;

class CuponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cupon::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(),
            'estado' => $this->faker->randomElement(["activo","inactivo"]),
            'total_desc' => $this->faker->word(),
            'tipo_desc' => $this->faker->randomElement(["fijo","porcentaje"]),
        ];
    }
}
