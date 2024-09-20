<?php

namespace Database\Factories;

use App\Models\Roster;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RosterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Roster::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'day' => $this->faker->date(),
            'time' => '0',
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
