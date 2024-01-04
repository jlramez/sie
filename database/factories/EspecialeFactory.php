<?php

namespace Database\Factories;

use App\Models\Especiale;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EspecialeFactory extends Factory
{
    protected $model = Especiale::class;

    public function definition()
    {
        return [
			'noexp' => $this->faker->name,
			'year' => $this->faker->name,
			'actor' => $this->faker->name,
			'entidad' => $this->faker->name,
			'trabajador_fallecido' => $this->faker->name,
			'fecha_recepcion' => $this->faker->name,
			'acciones_id' => $this->faker->name,
			'observaciones' => $this->faker->name,
			'ponencias_id' => $this->faker->name,
			'nike' => $this->faker->name,
        ];
    }
}
