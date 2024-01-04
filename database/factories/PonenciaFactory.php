<?php

namespace Database\Factories;

use App\Models\Ponencia;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PonenciaFactory extends Factory
{
    protected $model = Ponencia::class;

    public function definition()
    {
        return [
			'descripcion' => $this->faker->name,
        ];
    }
}
