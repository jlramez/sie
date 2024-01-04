<?php

namespace Database\Factories;

use App\Models\Etapa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EtapaFactory extends Factory
{
    protected $model = Etapa::class;

    public function definition()
    {
        return [
			'descripcion' => $this->faker->name,
        ];
    }
}
