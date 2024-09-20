<?php

namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sale::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'total_price' => $this->faker->randomNumber(2),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
