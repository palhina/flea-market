<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Comment;
use App\Models\Item;
use App\Models\Favorite;

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
    }
    
    // コメントページ表示テスト
    public function test_comment()
    {
        $user = User::factory()->create();
        $item = Item::factory()->create();       
        $comment = Comment::factory()->create(['item_id' => $item->id]);
        $favorite = Favorite::factory()->create(['item_id' => $item->id]);
        $response = $this->actingAs($user)->get("/comment/{$item->id}");
        $response->assertOk(); 
    }

    // コメント追加テスト
    public function test_commentTo()
    {
        $user = User::factory()->create();
        $item = Item::factory()->create();
        $commentData = [
            'comment' => 'testComment'
        ];
        $response = $this->actingAs($user)->post("/comment/{$item->id}",$commentData);
        $response->assertOk(); 
        $this->assertDatabaseHas('comments', [
            'user_id' => $user->id,
            'item_id' => $item->id,
            'comment' => 'testComment',
        ]);
    }

    // コメント削除テスト
    public function test_deleteComment()
    {
        $user = User::factory()->create();
        $item = Item::factory()->create();
        $comment = Comment::factory()->create(['item_id' => $item->id]);
        $response = $this->actingAs($user)->delete("/comment/delete/{$comment->id}");
        $this->assertDatabaseMissing('comments', [
            'user_id' => $user->id,
            'item_id' => $item->id,
            'comment' => $comment->comment,
        ]);      
    }
}
