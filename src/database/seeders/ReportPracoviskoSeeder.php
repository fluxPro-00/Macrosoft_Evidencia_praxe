<?php

namespace Database\Seeders;

use App\Models\Reportpracovisko;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportPracoviskoSeeder extends Seeder
{

    public function run(): void
    {
        Reportpracovisko::factory()->count(10)->create();
    }
}
