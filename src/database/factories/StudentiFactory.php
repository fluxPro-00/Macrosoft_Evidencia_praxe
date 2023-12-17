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
            'RokStudia' => $this->faker->randomElement([1, 2, 3, 4]),
            'Stupen' => $this->faker->randomElement(['Magistersky', 'Bakalarsky']),
            'AkademickyRok' => $this->faker->year,
            'Osvedcenia' => substr($this->faker->text, 0,125 ),
            'SchvalenyVykaz' => $this->faker->randomElement([0, 1]),
            'StudijneProgramy_idStudijneProgramy' => function () {
                return Studijneprogramy::pluck('idStudijneProgramy')->random();
            },
            'Pouzivatel_idPouzivatel' => function () {
                return Pouzivatel::pluck('idPouzivatel')->random();
            },
        ];
    }
}
