<?php

namespace Database\Factories;

use App\Models\Promocione;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PromocioneFactory extends Factory
{
    protected $model = Promocione::class;

    public function definition()
    {
        return [
			'folio' => $this->faker->name,
			'noexp' => $this->faker->name,
			'fecha_recibido_op' => $this->faker->name,
			'fecha_turnado' => $this->faker->name,
			'promovente' => $this->faker->name,
			'asunto' => $this->faker->name,
			'fojas' => $this->faker->name,
			'turnado_a' => $this->faker->name,
        ];
    }
}
