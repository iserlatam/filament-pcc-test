<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Nivel;

class NivelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Nivel::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'etiqueta' => $this->faker->word(),
        ];
    }
}
