<?php

namespace Database\Factories;

use \App\Models\Firmy;
use Illuminate\Database\Eloquent\Factories\Factory;
class FirmyFactory extends Factory
{
    protected $model = Firmy::class;

    public function definition(): array
    {
        return [
            'Nazov' => $this->faker->company,
            'Adresa' => substr($this->faker->address, 0,45 ),
        ];
    }
}
