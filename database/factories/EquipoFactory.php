<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipo>
 */
class EquipoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->randomElement(['Caimanes', 'Lobos', 'Dragones', 'Zorros', 'Escorpiones', 'Gladiadores']),
            'victorias' => $this->faker->randomNumber(),
            'empates' => $this->faker->randomNumber(),
            'derrotas' => $this->faker->randomNumber(),
        ];
    }
}
