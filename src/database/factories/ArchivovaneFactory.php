<?php

namespace Database\Factories;

use App\Models\Archivovane;
use App\Models\Praxe;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArchivovaneFactory extends Factory
{
    protected $model = Archivovane::class;

    public function definition(): array
    {
        return [
            'Datum' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'Praxe_idPraxe' => function () {
                return Praxe::pluck('idPraxe')->random();
            },
        ];
    }
}
