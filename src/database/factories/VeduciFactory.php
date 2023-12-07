<?php

namespace Database\Factories;

use App\Models\Pouzivatel;
use App\Models\Veduci;
use Illuminate\Database\Eloquent\Factories\Factory;

class VeduciFactory extends Factory
{
    protected $model = Veduci::class;

    public function definition(): array
    {
        return [
            'Meno' => $this->faker->firstName,
            'Priezvisko' => $this->faker->lastName,
            'Email' => $this->faker->unique()->safeEmail,
            'Heslo' => $this->faker->unique()->password,
            'Tel_cislo' => $this->faker->phoneNumber,
            'Pouzivatel_idPouzivatel' => Pouzivatel::pluck('idPouzivatel')->random(),
        ];
    }
}
