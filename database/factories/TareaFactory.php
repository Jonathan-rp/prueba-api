<?php

namespace Database\Factories;

use App\Models\Empresa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TareaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fecha_inicio = Carbon::instance($this->faker->dateTimeBetween('-1 months','+1 months'));
        $fecha_vencimiento = (clone $fecha_inicio)->addDays(random_int(0,14));

        return [
            'nombre' => $this->faker->word,
            'empresa_id' => Empresa::inRandomOrder()->first()->id,
            'user_id' => User::has('tareas','<=', 4)->inRandomOrder()->first()->id,
            'descripcion' => $this->faker->sentence,
            'estatus' => $this->faker->boolean,
            'fecha_inicio' => $fecha_inicio,
            'fecha_vencimiento' => $fecha_vencimiento,
        ];
    }
}
