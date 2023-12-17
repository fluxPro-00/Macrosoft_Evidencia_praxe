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

            'Pouzivatel_idPouzivatel' => Pouzivatel::pluck('idPouzivatel')->random(),

        ];
    }
}
