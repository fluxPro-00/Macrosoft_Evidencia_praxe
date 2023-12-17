<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Firmy;

class FirmySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Firmy::factory()->count(10)->create();
    }
}
