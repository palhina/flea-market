<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoldItem; 

class SoldItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sold_items = [
            [
                'user_id' => '1',
                'item_id' => '6',
                'payment_id' => '1'
            ],
            [
                'user_id' => '1',
                'item_id' => '8',
                'payment_id' => '2'

            ],
            [
                'user_id' => '2',
                'item_id' => '9',
                'payment_id' => '1'

            ],

        ];
    foreach ($sold_items as $sold_item) 
        {
            SoldItem::create([
                'user_id' => $sold_item['user_id'],
                'item_id' => $sold_item['item_id'],
                'payment_id' => $sold_item['payment_id'],
            ]);
        }
    }
}

