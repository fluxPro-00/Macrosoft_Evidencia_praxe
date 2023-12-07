<?php

namespace Database\Factories;

use App\Models\Pouzivatel;
use App\Models\Studenti;
use App\Models\Studijneprogramy;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentiFactory extends Factory
{
    protected $model = Studenti::class;

    public function definition(): array
    {
        return [
            'Meno' => $this->faker->firstName,
            'Priezvisko' => $this->faker->lastName,
            'Email' => $this->faker->unique()->safeEmail,
            'Heslo' => $this->faker->unique()->password,
            'Tel_cislo' => substr($this->faker->phoneNumber, 0,10 ),
            'StudijneProgramy_idStudijneProgramy' => function () {
                return Studijneprogramy::pluck('idStudijneProgramy')->random();
            },
            'Pouzivatel_idPouzivatel' => function () {
                return Pouzivatel::pluck('idPouzivatel')->random();
            },
        ];
    }
}
