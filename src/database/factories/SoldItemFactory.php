<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SoldItem;
use App\Models\User;
use App\Models\Item;
use App\Models\Payment;

class SoldItemFactory extends Factory
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
            'item_id' => function () {
                return Item::factory()->create()->id;
            },
            'payment_id' => function () {
                return Payment::factory()->create()->id;
            },
        ];
    }
}
