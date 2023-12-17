<?php

namespace Database\Seeders;

use App\Models\PersonalAccessToken;
use Illuminate\Database\Seeder;

class PersonalAccessTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PersonalAccessToken::factory()->count(10)->create();
    }
}
