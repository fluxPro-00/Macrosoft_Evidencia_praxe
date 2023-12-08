<?php

namespace Database\Factories;

use App\Models\Praxe;
use App\Models\Studenti;
use App\Models\StudentiHasPraxe;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentiHasPraxeFactory extends Factory
{
    protected $model = StudentiHasPraxe::class;

    public function definition(): array
    {
        return [
            'Studenti_idStudenti' => function () {
                return Studenti::pluck('idStudenti')->random();
            },
            'Praxe_idPraxe' => function () {
                return Praxe::pluck('idPraxe')->random();
            },
        ];
    }
}
