<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Item;

class FavoriteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item_id' => function () {
                return Item::factory()->create()->id;
            },
            'user_id' => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
