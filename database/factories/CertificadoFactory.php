<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\;
use App\Models\Certificado;
use App\Models\Estudiante;

class CertificadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Certificado::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->word(),
            'vencimiento' => $this->faker->boolean(),
            'fecha_vencimiento' => $this->faker->date(),
            'observaciones' => $this->faker->text(),
            'estado' => $this->faker->randomElement(["aprobado","reprobado","revision","aplazado"]),
            'curso_id' => ::factory(),
            'estudiante_id' => Estudiante::factory(),
            'sede_id' => ::factory(),
        ];
    }
}
