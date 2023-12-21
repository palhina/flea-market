<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; 

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['レディース','メンズ','ベビー・キッズ','インテリア','コスメ','洋服','家電','ハンドメイド','レジャー'];
        Category::insert(array_map(function ($category) {
            return ['category_name' => $category];
        }, $categories));
    }
}
