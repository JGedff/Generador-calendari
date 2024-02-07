<?php

namespace Database\Factories;

use App\Models\Trimestre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trimestre>
 */
class TrimestreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            Trimestre::create([
                'nom' => $this->faker->word(),
                'data_inici' => $this->faker->dateTime(),
                'data_final' => $this->faker->dateTime()
            ])
        ];
    }
}
