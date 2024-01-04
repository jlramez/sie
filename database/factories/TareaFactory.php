<?php

namespace Database\Factories;

use App\Models\Tarea;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TareaFactory extends Factory
{
    protected $model = Tarea::class;

    public function definition()
    {
        return [
			'descripcion' => $this->faker->name,
			'etapas_id' => $this->faker->name,
        ];
    }
}
