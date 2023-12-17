<?php

namespace Database\Factories;

use App\Models\Administratori;
use App\Models\Reportadmin;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportadminFactory extends Factory
{
    protected $model = Reportadmin::class;
    public function definition(): array
    {
        return [
            'Obsah' =>substr($this->faker->text(), 0,255 ),
            'Administratori_idAdministratori' => function () {
                return Administratori::pluck('idAdministratori')->random(); },
            'Administratori_idAdministratori' => function () {
                return Administratori::pluck('idAdministratori')->random(); },
        ];
    }
}
