<?php

namespace Database\Factories;

use App\Models\Amparo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AmparoFactory extends Factory
{
    protected $model = Amparo::class;

    public function definition()
    {
        return [
			'carpeta' => $this->faker->name,
			'amtipos_id' => $this->faker->name,
			'folio' => $this->faker->name,
			'fecha_recibido_tjlb' => $this->faker->name,
			'fecha_presidencia' => $this->faker->name,
			'no_oficio' => $this->faker->name,
			'j_exp' => $this->faker->name,
			'expediente_tjlb' => $this->faker->name,
			'resolutivo' => $this->faker->name,
			'causa' => $this->faker->name,
			'plazo' => $this->faker->name,
			'multa' => $this->faker->name,
			'fecha_vencimiento' => $this->faker->name,
			'juzgados_id' => $this->faker->name,
			'ponencias_id' => $this->faker->name,
			'estatus_id' => $this->faker->name,
			'observaciones' => $this->faker->name,
        ];
    }
}
