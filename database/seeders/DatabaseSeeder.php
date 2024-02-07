<?php

namespace Database\Seeders;

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
        Cur::factory()->count(10)
            ->has(Festiu::factory()->count(5))
            ->has(Trimestre::factory()->count(3))
            ->create();
    }
}
