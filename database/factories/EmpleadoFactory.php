<?php

namespace Database\Factories;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmpleadoFactory extends Factory
{
    protected $model = Empleado::class;

    public function definition()
    {
        return [
			'noemp' => $this->faker->name,
			'nombre' => $this->faker->name,
			'puesto' => $this->faker->name,
			'departamento' => $this->faker->name,
			'estatus' => $this->faker->name,
        ];
    }
}
