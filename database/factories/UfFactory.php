<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Uf>
 */
class UfFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            Uf::create([
                'nom' => $this->faker->word(),
                'dies' => $this->faker->numberBetween(10, 99)
            ])
        ];
    }
}
