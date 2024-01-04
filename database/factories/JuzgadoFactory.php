<?php

namespace Database\Factories;

use App\Models\Juzgado;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JuzgadoFactory extends Factory
{
    protected $model = Juzgado::class;

    public function definition()
    {
        return [
			'descripcion' => $this->faker->name,
        ];
    }
}
