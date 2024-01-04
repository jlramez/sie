<?php

namespace Database\Factories;

use App\Models\Estatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EstatusFactory extends Factory
{
    protected $model = Estatus::class;

    public function definition()
    {
        return [
			'descripcion' => $this->faker->name,
        ];
    }
}
