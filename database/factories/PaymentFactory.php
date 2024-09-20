<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'total_payment' => $this->faker->randomNumber(2),
            'total_price' => $this->faker->randomNumber(2),
            'total_change' => $this->faker->randomNumber(2),
            'user_id' => \App\Models\User::factory(),
            'receipt_id' => \App\Models\Receipt::factory(),
        ];
    }
}
