<?php

namespace Database\Factories;

use App\Models\Actuacione;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ActuacioneFactory extends Factory
{
    protected $model = Actuacione::class;

    public function definition()
    {
        return [
			'descripcion' => $this->faker->name,
			'activo' => $this->faker->name,
        ];
    }
}
