<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ItemCategory; 

class ItemCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item_categories = [
            [
                'item_id' => '1',
                'category_id' => '3',
            ],
            [
                'item_id' => '1',
                'category_id' => '9',
            ],
            [
                'item_id' => '2',
                'category_id' => '1',
            ],
            [
                'item_id' => '2',
                'category_id' => '4',
            ],
            [
                'item_id' => '3',
                'category_id' => '1',
            ],
            [
                'item_id' => '3',
                'category_id' => '2',
            ],
            [
                'item_id' => '4',
                'category_id' => '3',
            ],
            [
                'item_id' => '4',
                'category_id' => '8',
            ],
            [
                'item_id' => '5',
                'category_id' => '1',
            ],
            [
                'item_id' => '6',
                'category_id' => '7',
            ],
            [
                'item_id' => '7',
                'category_id' => '6',
            ],
            [
                'item_id' => '8',
                'category_id' => '9',
            ],
            [
                'item_id' => '9',
                'category_id' => '3',
            ],
            [
                'item_id' => '10',
                'category_id' => '2',
            ],
        ];
        foreach ($item_categories as $item_category) 
        {
            ItemCategory::create([
                'item_id' => $item_category['item_id'],
                'category_id' => $item_category['category_id'],
            ]);
        }
    }
}

