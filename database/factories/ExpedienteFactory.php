<?php

namespace Database\Factories;

use App\Models\Expediente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ExpedienteFactory extends Factory
{
    protected $model = Expediente::class;

    public function definition()
    {
        return [
			'noexp' => $this->faker->name,
			'year' => $this->faker->name,
			'actor' => $this->faker->name,
			'demandado' => $this->faker->name,
			'no_actores' => $this->faker->name,
			'acciones_id' => $this->faker->name,
			'ponencias_id' => $this->faker->name,
			'estatus_id' => $this->faker->name,
			'original' => $this->faker->name,
			'duplicado' => $this->faker->name,
			'observaciones' => $this->faker->name,
			'acumulado' => $this->faker->name,
			'fecha_observacion' => $this->faker->name,
			'observaciones_colegiado' => $this->faker->name,
        ];
    }
}
