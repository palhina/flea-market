<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Database\Seeders\ItemsTableSeeder;
use App\Models\User;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Comment;
use App\Models\SoldItem;
use App\Models\Condition;


class ItemControllerTest extends TestCase
{
    use RefreshDatabase;

    // 商品一覧(おすすめ)画面表示テスト
    public function test_index()
    {
        $response = $this->get('/');
        $response->assertOk();
        $response->assertViewIs('items_recommend');
    }

    // 商品一覧(マイリスト)テスト
    public function test_favorite()
    {
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
        $user = User::factory()->create([
            'id' => 1,
        ]);
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->post('/item/favorite');
        $response->assertStatus(200); 
        $response->assertViewIs('items_favorite');
    }

    // 商品詳細ページテスト
    public function test_detail()
    {
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
        $this->seed(ItemsTableSeeder::class);
        $user = User::factory()->create(['id'=>1]);
        $item = Item::first(); 
        Favorite::factory()->create(['item_id' => $item->id, 'user_id' => $user->id]);
        Comment::factory()->count(3)->create(['item_id' => $item->id]);
        SoldItem::factory()->create(['item_id' => $item->id]);
        $category=Category::factory()->create();
        $condition=Condition::factory()->create();

        $url = '/item/' . $item->id;
        $this->actingAs($user);
        $response = $this->actingAs($user)->get($url);
        $response->assertStatus(200);
        $response->assertViewIs('item_detail');
        $response->assertViewHasAll([
            'item' => $item,
            'categories' => collect([$category]), 
            'favoriteCount' => 1, 
            'commentCount' => 3, 
        ]);
    }  
}
