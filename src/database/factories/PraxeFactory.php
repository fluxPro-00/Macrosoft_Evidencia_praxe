<?php

namespace Database\Factories;

use App\Models\Firmy;
use App\Models\Praxe;
use Illuminate\Database\Eloquent\Factories\Factory;

class PraxeFactory extends Factory
{
    protected $model = Praxe::class;

    public function definition(): array
    {
        return [
            'Firmy_idFirmy' => function () {
                return Firmy::pluck('idFirmy')->random();
            },
            'Pozícia' => substr($this->faker->jobTitle, 0,20 ),
            'Začiatok' => $this->faker->dateTimeThisYear,
            'Koniec' => $this->faker->dateTimeThisYear,
            'Stav' => $this->faker->randomElement(['Schvalena', 'Neschvalena', 'Archivovana']),
            'Hodnotenie' => $this->faker->numberBetween(1, 5),
        ];
    }
}
