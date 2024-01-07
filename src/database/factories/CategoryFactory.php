<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_name'=>$this->faker->unique()->randomElement(['レディース','メンズ','ベビー・キッズ','インテリア','コスメ','洋服','家電','ハンドメイド','レジャー']),
        ];
    }
}
