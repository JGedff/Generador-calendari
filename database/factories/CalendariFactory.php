<?php

namespace Database\Factories;

use App\Models\Calendari;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calendari>
 */
class CalendariFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            Calendari::create([
                'curs' => $this->faker->word(),
                'cicle_modul' => $this->faker->word(),
                'dl_days' => $this->faker->numberBetween(0, 5),
                'dm_days' => $this->faker->numberBetween(0, 5),
                'dc_days' => $this->faker->numberBetween(0, 5),
                'dj_days' => $this->faker->numberBetween(0, 5),
                'dv_days' => $this->faker->numberBetween(0, 5),
                'ufName' => $this->faker->word(),
                'ufDays' => $this->faker->numberBetween(0, 100)
            ])
        ];
    }
}
