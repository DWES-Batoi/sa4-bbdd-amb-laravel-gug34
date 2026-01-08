<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partit>
 */
class PartitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'local_id' => \App\Models\Equip::factory(),
            'visitant_id' => \App\Models\Equip::factory(),
            'estadi_id' => \App\Models\Estadi::factory(),
            'data' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'jornada' => $this->faker->numberBetween(1, 38),
            'gols' => $this->faker->numberBetween(0, 5),
        ];
    }
}
