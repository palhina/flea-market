<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\User;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    // 新規会員登録機能テスト
    public function test_register()
    {
        $response = $this->get('/register');
        $response->assertOk();
        $response->assertViewIs('auth.register');
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
        $userData = [
            'email' => 'test@example.com',
            'password' => bcrypt('1234567890'),
        ];
        $response = $this->post('/register', $userData);
        $response->assertStatus(302)->assertRedirect('/login');
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);
    }

    // ログイン機能テスト
    public function test_login()
    {
        $response = $this->get('/login');
        $response->assertOk();
        $response->assertViewIs('auth.login');
        $this->assertGuest();
        $response = $this->dummyLogin();
        $response->assertStatus(200);
        $this->assertAuthenticated();
    }

    // ログアウト機能テスト
    public function test_logout()
    {
        $response = $this->dummyLogin();
        $this->assertAuthenticated();
        $response = $this->get('/logout');
        $this->assertGuest();
    }

    /**
     * テスト用ダミーユーザー作成
     */
    private function dummyLogin()
    {
        $user = new User();
        $user->email = 'test@example.com'; 
        $user->password = bcrypt('1234567890');
        $user->save();
        return $this->actingAs($user)
            ->withSession(['user_id' => $user->id])
            ->get('/'); 
    }

}

