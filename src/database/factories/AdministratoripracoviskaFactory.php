<?php

namespace Database\Factories;

use App\Models\Administratoripracoviska;
use App\Models\Pracoviska;
use App\Models\Administratori;
use Illuminate\Database\Eloquent\Factories\Factory;
class AdministratoripracoviskaFactory extends Factory
{
    protected $model = Administratoripracoviska::class;

    public function definition(): array
    {
        return [
            'Pracoviska_idPracoviska' => Pracoviska::pluck('idPracoviska')->random(),
            'Administratori_idAdministratori' => Administratori::pluck('idAdministratori')->random(),
        ];
    }
}
