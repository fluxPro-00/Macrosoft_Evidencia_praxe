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
            'Email' => substr($this->faker->safeEmail, 0,45 ),
            'Heslo' => $this->faker->unique()->password,
            'Tel_cislo' => substr($this->faker->address, 0,10 ),
            'Pouzivatel_idPouzivatel' => Pouzivatel::pluck('idPouzivatel')->random(),
        ];
    }
}
