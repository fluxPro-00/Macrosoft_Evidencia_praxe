<?php

namespace Database\Factories;

use App\Models\Praxpracoviska;
use App\Models\Praxe;
use App\Models\Pracoviska;
use Illuminate\Database\Eloquent\Factories\Factory;

class PraxpracoviskaFactory extends Factory
{
    protected $model = Praxpracoviska::class;

    public function definition(): array
    {
        return [
            'Praxe_idPraxe' => function () {
                return Praxe::pluck('idPraxe')->random();
            },
            'Pracoviska_idPracoviska' => function () {
                return Pracoviska::pluck('idPracoviska')->random();
            },
        ];
    }
}
