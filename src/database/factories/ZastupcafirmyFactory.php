<?php

namespace Database\Factories;

use App\Models\Firmy;
use App\Models\Pouzivatel;
use App\Models\Zastupcafirmy;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZastupcafirmyFactory extends Factory
{
    protected $model = Zastupcafirmy::class;

    public function definition(): array
    {
        return [
            'Firmy_idFirmy' => Firmy::pluck('idFirmy')->random(),
            'Pouzivatel_idPouzivatel' => Pouzivatel::pluck('idPouzivatel')->random(),
        ];
    }
}
