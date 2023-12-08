<?php

namespace Database\Factories;

use App\Models\Administratori;
use App\Models\Pouzivatel;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdministratoriFactory extends Factory
{
    protected $model = Administratori::class;

    public function definition(): array
    {
        return [

            'Meno' => $this->faker->firstName,
            'Priezvisko' => $this->faker->lastName,
            'Email' => substr($this->faker->safeEmail, 0,45 ),
            'Heslo' => $this->faker->unique()->password,
            'Tel_cislo' => substr($this->faker->phoneNumber, 0,10 ),
            'Pouzivatel_idPouzivatel' => Pouzivatel::pluck('idPouzivatel')->random(),

        ];
    }
}
