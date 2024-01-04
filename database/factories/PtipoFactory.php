<?php

namespace Database\Factories;

use App\Models\Ptipo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PtipoFactory extends Factory
{
    protected $model = Ptipo::class;

    public function definition()
    {
        return [
			'descripcion' => $this->faker->name,
        ];
    }
}
