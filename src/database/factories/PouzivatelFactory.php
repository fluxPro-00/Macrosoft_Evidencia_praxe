<?php

namespace Database\Factories;

use App\Models\Pouzivatel;
use Illuminate\Database\Eloquent\Factories\Factory;
class PouzivatelFactory extends Factory
{
    protected $model = Pouzivatel::class;

    public function definition(): array
    {
        return [
            'Meno' => $this->faker->firstName,
            'Priezvisko' => $this->faker->lastName,
            'Tel_cislo' => substr($this->faker->phoneNumber, 0,10 ),
            'Email' => substr($this->faker->safeEmail, 0,45 ),
            'Heslo' => $this->faker->unique()->password,
            'Typ' => $this->faker->randomElement([1, 2, 3]),
        ];
    }
}
