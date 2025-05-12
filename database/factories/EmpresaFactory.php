<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Empresa;

class EmpresaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresa::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(),
            'nit' => $this->faker->word(),
            'campo' => $this->faker->word(),
            'dpto' => $this->faker->word(),
            'ciudad' => $this->faker->word(),
            'direccion' => $this->faker->word(),
            'rep_legal' => $this->faker->word(),
            'arl' => $this->faker->word(),
        ];
    }
}
