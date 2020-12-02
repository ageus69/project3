<?php

namespace Database\Factories;

use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProyectoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proyecto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'categoria_id' => $this->faker->numberBetween(1,5),
            'user_id' => $this->faker->numberBetween(1,5),
            'name' => $this->faker->name,
            'detalles'  => $this->faker->paragraph,
        ];
    }
}
