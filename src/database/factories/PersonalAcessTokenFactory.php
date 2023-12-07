<?php

namespace Database\Factories;

use App\Models\PersonalAccessToken;
use Illuminate\Database\Eloquent\Factories\Factory;
use Workbench\Database\Factories\PersonalAccessTokenFactory;

class PersonalAcessTokenFactory extends Factory
{
    protected $model = PersonalAccessToken::class;

    public function definition(): array
    {
        return [
            'tokenable_type' => $this->faker->randomElement(['App\\Models\\User', 'App\\Models\\Admin']),
            'tokenable_id' => $this->faker->numberBetween(1, 100),
            'name' => $this->faker->word,
            'token' => $this->faker->sha256,
            'abilities' => ['create', 'read', 'update', 'delete'],
            'last_used_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'expires_at' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
