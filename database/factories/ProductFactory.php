<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => 'Люстра ' . $this->faker->word,
            'price' => $this->faker->randomFloat(2, 350, 100000),
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
