<?php

namespace Database\Factories;

use App\Models\Estado;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EstadoFactory extends Factory
{
    protected $model = Estado::class;

    public function definition()
    {
        return [
			'descripcion' => $this->faker->name,
        ];
    }
}
