<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Studijneprogramy;
class StudijneprogramySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Studijneprogramy::factory()->count(10)->create();
    }
}
