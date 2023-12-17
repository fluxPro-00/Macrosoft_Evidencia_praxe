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
            'Pouzivatel_idPouzivatel' => Pouzivatel::pluck('idPouzivatel')->random(),
        ];
    }
}
