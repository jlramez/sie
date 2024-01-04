<?php

namespace Database\Factories;

use App\Models\Amtipo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AmtipoFactory extends Factory
{
    protected $model = Amtipo::class;

    public function definition()
    {
        return [
			'descripcion' => $this->faker->name,
        ];
    }
}
