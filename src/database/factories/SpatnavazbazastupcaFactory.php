<?php

namespace Database\Factories;

use App\Models\Praxe;
use App\Models\Spatnavazbazastupca;
use App\Models\Veduci;
use App\Models\Zastupcafirmy;
use Illuminate\Database\Eloquent\Factories\Factory;


class SpatnavazbazastupcaFactory extends Factory
{
    protected $model = Spatnavazbazastupca::class;
    public function definition(): array
    {
        return [
            'Obsah' =>substr($this->faker->text(), 0,255 ),
            'zastupcafirmy_idZastupcaFirmy' => function () {
                return Zastupcafirmy::pluck('idZastupcafirmy')->random(); },
            'veduci_idVeduci' => function () {
                return Veduci::pluck('idVeduci')->random(); },
            'praxe_idPraxe' => function () {
                return Praxe::pluck('idPraxe')->random(); },

        ];
    }
}
