<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;
use App\Models\User;
use App\Models\Condition;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'condition_id' => function () {
                return Condition::factory()->create()->id;
            },
            'img_url' =>$this->faker->imageURL(),
            'item_name' =>$this->faker->word,
            'discription' =>$this->faker->sentences(10),
            'price' =>$this->faker->numberBetween(1,1000000),
        ];
    }
}
