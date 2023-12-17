<?php

namespace Database\Factories;

use App\Models\Pouzivatel;
use App\Models\Poverenizamestnanci;
use App\Models\Pracoviska;
use Illuminate\Database\Eloquent\Factories\Factory;
class PoverenizamestnanciFactory extends Factory
{
    protected $model = Poverenizamestnanci::class;

    public function definition(): array
    {
        return [
            'Pracoviska_idPracoviska' => function () {
                return Pracoviska::pluck('idPracoviska')->random();
            },
            'Pouzivatel_idPouzivatel' => function () {
                return Pouzivatel::pluck('idPouzivatel')->random();
            },
        ];
    }
}
