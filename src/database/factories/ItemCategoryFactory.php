<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ItemCategory;
use App\Models\Item;
use App\Models\Category;

class ItemCategoryFactory extends Factory
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
            'category_id' => function () {
                return Category::factory()->create()->id;
            },
        ];
    }
}
