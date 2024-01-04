<?php

namespace Database\Factories;

use App\Models\Asignadocumento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AsignadocumentoFactory extends Factory
{
    protected $model = Asignadocumento::class;

    public function definition()
    {
        return [
			'cantidad' => $this->faker->name,
			'fojas' => $this->faker->name,
			'promociones_id' => $this->faker->name,
			'tipodocumentos_id' => $this->faker->name,
        ];
    }
}
