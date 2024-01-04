<?php

namespace Database\Factories;

use App\Models\Paraprocesale;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ParaprocesaleFactory extends Factory
{
    protected $model = Paraprocesale::class;

    public function definition()
    {
        return [
			'noexp' => $this->faker->name,
			'year' => $this->faker->name,
			'actor' => $this->faker->name,
			'demandado' => $this->faker->name,
			'acciones_id' => $this->faker->name,
			'fecha_recepcion' => $this->faker->name,
			'observaciones' => $this->faker->name,
			'ponencias_id' => $this->faker->name,
        ];
    }
}
