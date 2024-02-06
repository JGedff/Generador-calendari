<?php

namespace Database\Factories;

use App\Models\Festiu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Festiu>
 */
class FestiuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            Festiu::create([
                'nom' => $this->faker->string(),
                'data_inici' => $this->faker->dateTime(),
                'data_final' => $this->faker->dateTime(),
                'vacances' => $this->faker->boolean()
            ])
        ];
    }
}
