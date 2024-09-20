<?php

namespace Database\Factories;

use App\Models\SaleProduct;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SaleProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price' => $this->faker->randomNumber(2),
            'quantity' => $this->faker->randomNumber(0),
            'product_id' => \App\Models\Product::factory(),
            'sale_id' => \App\Models\Sale::factory(),
        ];
    }
}
