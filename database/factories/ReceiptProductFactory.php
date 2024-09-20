<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ReceiptProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReceiptProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReceiptProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomNumber(2),
            'quantity' => $this->faker->randomNumber(),
            'receipt_id' => \App\Models\Receipt::factory(),
            'product_id' => \App\Models\Product::factory(),
        ];
    }
}
