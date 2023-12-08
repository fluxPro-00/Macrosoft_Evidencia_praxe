<?php

namespace Database\Factories;

use App\Models\Pracoviska;
use App\Models\Veduci;
use Illuminate\Database\Eloquent\Factories\Factory;

class PracoviskaFactory extends Factory
{
    protected $model = Pracoviska::class;

    public function definition(): array
    {
        return [
            'Nazov' =>substr($this->faker->company, 0,45 ),
            'Adresa' => substr($this->faker->address, 0,45 ),
            'Veduci_idVeduci' => function () {
                return Veduci::pluck('idVeduci')->random();
            },
        ];
    }
}
