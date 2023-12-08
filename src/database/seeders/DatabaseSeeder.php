<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Administratoripracoviska;
use App\Models\PersonalAccessToken;
use App\Models\Studenti;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(PouzivatelSeeder::class);
        $this->call(AdministratoriSeeder::class);
        $this->call(VeduciSeeder::class);
        $this->call(FirmySeeder::class);
        $this->call(PraxeSeeder::class);
        $this->call(PracoviskaSeeder::class);
        $this->call(AdministratoripracoviskaSeeder::class);
        $this->call(ArchivovaneSeeder::class);
        $this->call(PoverenizamestnanciSeeder::class);
        $this->call(PraxpracoviskaSeeder::class);
        $this->call(StudijneprogramySeeder::class);
        $this->call(StudentiSeeder::class);
        $this->call(StudentiHasPraxeSeeder::class);
        $this->call(ZastupcaSeeder::class);
        $this->call(PersonalAccessTokenSeeder::class);
    }
}
