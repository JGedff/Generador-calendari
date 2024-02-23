<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cur;
use App\Models\Festiu;
use App\Models\Trimestre;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(10);

        Calendari::factory()->count(2)
            ->has(
                Cur::factory()->count(10)
                    -has(
                        Cicle::factory()->count(8)
                            ->has(
                                Modul::factory()->count(4)
                                    ->has(Dia::factory()->count(3))
                                    ->has(Uf::factory()->count(2))
                            )
                    )
                    ->has(Festiu::factory()->count(5))
                    ->has(Trimestre::factory()->count(3))
            )
            ->create();
    }
}
