<?php

namespace Database\Factories;

use App\Models\Firmy;
use App\Models\Pouzivatel;
use App\Models\Zastupcacafirmy;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZastupcacafirmyFactory extends Factory
{
    protected $model = Zastupcacafirmy::class;

    public function definition(): array
    {
        return [
            'Meno' => $this->faker->firstName,
            'Priezvisko' => $this->faker->lastName,
            'Email' => substr($this->faker->safeEmail, 0,45 ),
            'Heslo' => $this->faker->unique()->password,
            'Tel_cislo' => substr($this->faker->phoneNumber, 0,45 ),
            'Firmy_idFirmy' => Firmy::pluck('idFirmy')->random(),
            'Pouzivatel_idPouzivatel' => Pouzivatel::pluck('idPouzivatel')->random(),
        ];
    }
}
