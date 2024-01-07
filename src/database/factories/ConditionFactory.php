<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Condition;


class ConditionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'condition_name'=>$this->faker->randomElement(['優','良','可','不可']),
        ];
    }
}
