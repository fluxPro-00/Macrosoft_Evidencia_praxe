<?php

namespace Database\Factories;

use App\Models\Pracoviska;
use App\Models\Reportpracovisko;
use App\Models\Veduci;
use Illuminate\Database\Eloquent\Factories\Factory;


class ReportpracoviskoFactory extends Factory
{
    protected $model = Reportpracovisko::class;
    public function definition(): array
    {
        return [
            'Obsah' =>substr($this->faker->text(), 0,255 ),
            'pracoviska_idPracoviska' => function () {
                return Pracoviska::pluck('idPracoviska')->random(); },
            'veduci_idVeduci1' => function () {
                return Veduci::pluck('idVeduci')->random(); },

        ];
    }
}
