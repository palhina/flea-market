<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment; 

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = [
            [
                'user_id' => '2',
                'item_id' => '1',
                'comment' =>'こんにちは、100円に値下げ可能ですか？',
            ],
            [
                'user_id' => '1',
                'item_id' => '1',
                'comment' =>'200円なら可能です。',
            ],
        ];
        foreach ($comments as $comment) 
        {
            Comment::create([
                'user_id' => $comment['user_id'],
                'item_id' => $comment['item_id'],
                'comment' => $comment['comment'],
            ]);
        }
    }
}
