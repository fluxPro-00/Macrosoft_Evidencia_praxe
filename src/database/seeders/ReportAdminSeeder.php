<?php

namespace Database\Seeders;

use App\Models\Reportadmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reportadmin::factory()->count(10)->create();
    }
}
