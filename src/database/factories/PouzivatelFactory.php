<?php

namespace Database\Factories;

use App\Models\Pouzivatel;
use Illuminate\Database\Eloquent\Factories\Factory;
class PouzivatelFactory extends Factory
{
    protected $model = Pouzivatel::class;

    public function definition(): array
    {
        return [
            'Typ' => $this->faker->randomElement([1, 2, 3]),
        ];
    }
}
