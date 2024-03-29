<?php

namespace Database\Factories;

use App\Models\Cur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cur>
 */
class CurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            Cur::create([
                'nom' => $this->faker->word(),
                'data_inici' => $this->faker->dateTime(),
                'data_final' => $this->faker->dateTime()
            ])
        ];
    }
}
