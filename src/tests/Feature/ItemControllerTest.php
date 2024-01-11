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
use App\Models\Address;


class ItemControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
    }

    // 商品一覧(おすすめ)画面表示テスト
    public function test_index()
    {
        $response = $this->get('/');
        $response->assertOk();
        $response->assertViewIs('items_recommend');
    }

    // 商品一覧(マイリスト)表示テスト
    public function test_favorite()
    {
        $this->user = User::factory()->create(['id' => 1]);
        $this->actingAs($this->user);
        $response = $this->post('/item/favorite');
        $response->assertOk(); 
        $response->assertViewIs('items_favorite');
    }

    // 商品詳細ページテスト
    public function test_detail()
    {
        // ダミーデータ作成
        $this->seed(ItemsTableSeeder::class);      
        $user = User::factory()->create(['id' => 1]);
        $item = Item::first();       
        Favorite::factory()->count(5)->create(['item_id' => $item->id]);
        Comment::factory()->count(3)->create(['item_id' => $item->id]);
        ItemCategory::factory()->create(['item_id'=>1,'category_id'=>1]);
        $this->category = Category::factory()->create(['id'=>1]);
        $this->condition = Condition::factory()->create(['id' => 2]);

        // ページ表示
        $response = $this->actingAs($user)->get("/item/{$item->id}");
        $response->assertOk();
        $response->assertViewIs('item_detail');
        $response->assertViewHasAll([
            'item' => $item,
            'favoriteCount' => 5, 
            'commentCount' => 3,
        ]);
    }  

    // 購入ページ表示テスト
    public function test_purchase()
    {
        $this->seed(ItemsTableSeeder::class);      
        $this->user = User::factory()->create(['id' => 1]);
        $this->item = Item::first();     
        $address = Address::factory()->create(['user_id'=>1]);

        $this->actingAs($this->user);
        $response = $this->actingAs($this->user)->get("/purchase/{$this->item->id}");
        $response->assertOk();
        $response->assertViewIs('buy_item');
        $response->assertViewHasAll([
            'item' => $this->item,
            'userAddress' => $address 
        ]);
    }

    // 購入処理テスト
    public function test_getItem()
    {
        $this->seed(ItemsTableSeeder::class);      
        $this->user = User::factory()->create(['id' => 1]);
        $this->item = Item::first();  
        SoldItem::factory()->create(['item_id' => $this->item->id,'user_id' => $this->user->id,'payment_id' => 1]);   
        $paymentId = 1;
        $response = $this->post("/purchase/{$this->item->id}",['payment' => $paymentId]);
        $this->assertDatabaseHas('sold_items', [
            'user_id' => $this->user->id,
            'item_id' => $this->item->id,
            'payment_id' => $paymentId,
        ]);
    }  

    // 出品ページ表示テスト
    public function test_list()
    {
        $this->user = User::factory()->create(['id' => 1]);
        $response = $this->actingAs($this->user)->get("/sell");
        $response->assertOk();
        $response->assertViewIs('sell_item');
    }

    // 出品処理テスト
    public function test_sell()
    {
        // ダミー商品データ作成
        $this->user = User::factory()->create(['id' => 1]);
        $itemcategory = ItemCategory::factory()->create(['item_id'=>1,'category_id'=>1]);
        $this->category = Category::factory()->create(['id'=>1]);
        $this->condition = Condition::factory()->create(['id' => 1]);
        $itemData = [
            'condition_name' => $this->condition->id,
            'category_name' => $this->category->id,
            'name' => 'testItem',
            'comment' => 'testComment',
            'price' => 1000,
        ];
        
        // 出品処理
        $response = $this->actingAs($this->user)->post("/sell/{$this->user->id}", $itemData);
        $this->assertDatabaseHas('items', [
            'item_name' => 'testItem',
            'description' => 'testComment',
            'price' => 1000,
        ]);
        $this->assertDatabaseHas('item_categories', [
            'item_id' => Item::first()->id,
            'category_id' => $this->category->id,
        ]);
    }

    // 検索機能テスト
    public function test_search()
    {
        // ダミー商品データ作成
        $item1 = Item::factory()->create(['id'=>1, 'item_name' => 'アイテム1', 'description' => '説明1']);
        $item2 = Item::factory()->create(['item_name' => 'アイテム2', 'description' => '説明2']);
        $itemcategory = ItemCategory::factory()->create(['item_id'=>1,'category_id'=>1]);
        $category = Category::factory()->create(['id' =>1, 'category_name' => 'カテゴリ1']);

        // 検索機能テスト(商品名、詳細、カテゴリ)
        $response = $this->post('/search', ['keyword' => 'アイテム1']);
        $this->assertEquals('アイテム1', $item1['item_name']);
        $this->assertEquals('説明1', $item1['description']);

        $response = $this->post('/search', ['keyword' => '説明2']);
        $this->assertEquals('アイテム2', $item2['item_name']);
        $this->assertEquals('説明2', $item2['description']);

        $response = $this->post('/search', ['keyword' => 'カテゴリ1']);
        $this->assertEquals('アイテム1', $item1['item_name']);
        $this->assertEquals('説明1', $item1['description']);
    }

}

