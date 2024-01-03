<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item; 

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'user_id' => '1',
                'condition_id' =>'2',
                'img_url' =>'/images/item/bag.jpg',
                'item_name' =>'エコバッグ',
                'description' =>'英字がプリントされたエコバッグです。大容量入ります。',
                'price' =>'300',
            ],
            [
                'user_id' => '1',
                'condition_id' =>'1',
                'img_url' =>'/images/item/figurine.jpg',
                'item_name' =>'アロマキャンドル',
                'description' =>'バラをかたどったアロマキャンドルです。',
                'price' =>'3000',
            ],
            [
                'user_id' => '1',
                'condition_id' =>'3',
                'img_url' =>'/images/item/grasses.jpg',
                'item_name' =>'サングラス',
                'description' =>'偏光サングラスです。運転、レジャー用にどうぞ。',
                'price' =>'1500',

            ],
            [
                'user_id' => '1',
                'condition_id' =>'2',
                'img_url' =>'/images/item/pillow.jpg',
                'item_name' =>'クッション',
                'description' =>'手触りの良いクッションです。少しヘタリあり。',
                'price' =>'500',
            ],
            [
                'user_id' => '2',
                'condition_id' =>'1',
                'img_url' =>'/images/item/scrub.jpg',
                'item_name' =>'ボディスクラブ',
                'description' =>'新品、未使用です。',
                'price' =>'3000',
            ],
            [
                'user_id' => '2',
                'condition_id' =>'1',
                'img_url' =>'/images/item/soap.jpg',
                'item_name' =>'ボディソープ・バスソルト',
                'description' =>'ボディソープ、バスソルトのセットです。新品未使用ですが、素人保管のためご了承ください',
                'price' =>'4000',

            ],
            [
                'user_id' => '2',
                'condition_id' =>'3',
                'img_url' =>'/images/item/teddy-bear.jpg',
                'item_name' =>'クマのぬいぐるみ',
                'description' =>'抱き心地最高です。プレゼントにどうぞ。',
                'price' =>'3000',

            ],
            [
                'user_id' => '3',
                'condition_id' =>'1',
                'img_url' =>'/images/item/tumbler.jpg',
                'item_name' =>'タンブラー',
                'description' =>'ペアのタンブラーです。保温・保冷可能',
                'price' =>'5000',
            ],
            [
                'user_id' => '3',
                'condition_id' =>'4',
                'img_url' =>'/images/item/dog_wear.jpg',
                'item_name' =>'洋服（小型犬用）',
                'description' =>'ワンちゃん用の洋服です。着用後汚れあり。',
                'price' =>'1000',
            ],
            [
                'user_id' => '3',
                'condition_id' =>'2',
                'img_url' =>'/images/item/camera.jpg',
                'item_name' =>'デジタルカメラ',
                'description' =>'数回使用した程度のため、美品です。',
                'price' =>'15000',
            ],
        ];
    foreach ($items as $item) 
        {
            Item::create([
                'user_id' => $item['user_id'],
                'condition_id' => $item['condition_id'],
                'img_url' => $item['img_url'],
                'item_name' => $item['item_name'],
                'description' => $item['description'],
                'price' => $item['price'],
            ]);
        }
    }
}
