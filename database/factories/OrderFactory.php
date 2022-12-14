<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'total_price' => $this->faker->numberBetween(100, 100000),
            'reference_number' => $this->faker->uuid(),
        ];
    }
}
