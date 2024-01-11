<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Address;
use App\Models\Item;
use App\Models\SoldItem;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
    }

    // 住所登録ページ表示テスト
    public function test_address()
    {
        $user1 = User::factory()->create(['id' => 1]);
        $address1 = Address::factory()->create(['user_id'=>1]);
        $user2 = User::factory()->create(['id' => 2]);
        //住所未登録の場合
        $response = $this->actingAs($user2)->get("/purchase/address/{$user2->id}");
        $response->assertOk();
        $response->assertViewIs('address_registration');
        // 住所登録済みの場合
        $response = $this->actingAs($user1)->get("/purchase/address/{$user1->id}");
        $response->assertOk();
        $response->assertViewIs('redirect_edit_profile');
    }

    // 住所登録処理テスト
    public function test_CreateAddress()
    {
        $user = User::factory()->create(['id' => 1]);
        $userAddress = [
            'user_id' => 1,
            'postcode' => '123-4567',
            'address' => 'testAddress',
            'building' => 'testBuildingName',
        ];
        $response = $this->actingAs($user)->post("/purchase/address/{$user->id}", $userAddress);

        $this->assertDatabaseHas('addresses', [
            'postcode' => '123-4567',
            'address' => 'testAddress',
            'building' => 'testBuildingName',
        ]);
    }

    // プロフィール編集画面表示テスト
    public function test_editAddress()
    {
        $user1 = User::factory()->create(['id' => 1]);
        $address1 = Address::factory()->create(['user_id'=>1]);
        $user2 = User::factory()->create(['id' => 2]);
        //住所未登録の場合
        $response = $this->actingAs($user2)->get("/mypage/profile/{$user2->id}");
        $response->assertOk();
        $response->assertViewIs('address_registration');
        // 住所登録済みの場合
        $response = $this->actingAs($user1)->get("/mypage/profile/{$user1->id}");
        $response->assertOk();
        $response->assertViewIs('edit_profile');
    }

    // プロフィール編集処理テスト
    public function test_postEditAddress()
    {
        $user = User::factory()->create(['id' => 1]);
        $address = Address::factory()->create(['user_id'=>1]);
        $addressData = [
            'name' => 'New Name',
            'postcode' => '123-4567',
            'address' => 'New Address',
            'building' => 'New Building',
        ];
        $response = $this->actingAs($user)
            ->put("/mypage/profile/{$user->id}", $addressData);
        $user->refresh();
        $address->refresh();

        $this->assertEquals('New Name', $user->name);
        $this->assertEquals('123-4567', $address->postcode);
        $this->assertEquals('New Address', $address->address);
        $this->assertEquals('New Building', $address->building);
        $response->assertRedirect('/');
    }

    // マイページ(出品商品)表示テスト
    public function test_soldItem()
    {
        $user = User::factory()->create(['id' => 1]);
        $item = Item::factory()->create(['user_id' => 1]);
        $response = $this->actingAs($user)->get('/mypage');
        $response->assertOk();
        $response->assertViewIs('mypage_sell');
        $response->assertViewHas('items');
        $items = $response->original->getData()['items'];
        $this->assertTrue($items->contains($item));
    }

    // マイページ(購入商品)表示テスト
    public function test_boughtItem()
    {
        $user = User::factory()->create(['id' => 1]);
        $soldItem = SoldItem::factory()->create(['user_id' => 1]);
        $response = $this->actingAs($user)->get('/mypage/buy');
        $response->assertOk();
        $response->assertViewIs('mypage_buy');
        $response->assertViewHas('soldItems');
        $soldItems = $response->original->getData()['soldItems'];
        $this->assertTrue($soldItems->contains($soldItem));
    }
}
