<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Favorite; 

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $favorites = [
            [
                'user_id' => '1',
                'item_id' => '6',
            ],
            [
                'user_id' => '1',
                'item_id' => '8',
            ],
            [
                'user_id' => '2',
                'item_id' => '2',
            ],

        ];
    foreach ($favorites as $favorite) 
        {
            Favorite::create([
                'user_id' => $favorite['user_id'],
                'item_id' => $favorite['item_id'],
            ]);
        }
    }
}
