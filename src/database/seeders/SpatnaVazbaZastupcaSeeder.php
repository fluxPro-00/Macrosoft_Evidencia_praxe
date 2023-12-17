<?php

namespace Database\Seeders;

use App\Models\Spatnavazbazastupca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpatnaVazbaZastupcaSeeder extends Seeder
{
    public function run(): void
    {
        Spatnavazbazastupca::factory()->count(10)->create();
    }
}
