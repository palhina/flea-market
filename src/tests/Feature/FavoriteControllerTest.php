<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Item;
use App\Models\Favorite;

class FavoriteControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
    }
    
    // お気に入り追加機能テスト
    public function test_addFavorite()
    {
        $user = User::factory()->create();
        $item = Item::factory()->create(['user_id' => $user->id]);
        $response = $this->actingAs($user)->post("/favorite_add/{$item->id}");
        $response->assertOk(); 
        $this->assertDatabaseHas('favorites', [
            'user_id' => $user->id,
            'item_id' => $item->id,
        ]);       
    }

    // お気に入り削除機能テスト
    public function test_deleteFavorite()
    {
        $user = User::factory()->create();
        $item = Item::factory()->create(['user_id'=>$user->id]);
        $favorite = Favorite::factory()->create(['user_id'=>$user->id, 'item_id'=>$item->id]);
        $this->actingAs($user);
        $response = $this->delete("/favorite_delete/{$item->id}");
        $response->assertOk(); 
        $this->assertDatabaseMissing('favorites', [
            'user_id' => $user->id,
            'item_id' => $item->id,
        ]);       
    }
}
