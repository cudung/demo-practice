<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => rand(1,20),
            'name' => $this->faker->name(),
            'price' => rand(20000, 100000),
            'discount' => rand(5, 50),
        ];
    }
}
