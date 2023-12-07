<?php

namespace Database\Factories;

use App\Models\Studijneprogramy;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudijneprogramyFactory extends Factory
{
    protected $model = Studijneprogramy::class;

    public function definition(): array
    {
        return [
            'Nazov' => $this->faker->words(3, true),
            'Skratka' => $this->faker->lexify('???'),
        ];
    }
}
