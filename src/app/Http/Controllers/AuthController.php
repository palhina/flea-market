<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ユーザー新規登録ページ表示
    public function register()
    {
        return view('auth.register');
    }

    // ユーザー新規登録処理
    public function postRegister(RegisterRequest $request)
    {   
        User::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return view('auth.login');
    }

    // ユーザーログインページ表示
    public function login()
    {
        return view('auth.login');
    }

    // ユーザーログイン処理
    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect('/');
        } else {
            return view('auth.login')->with('result', 'メールアドレスまたはパスワードが違います');
        }
    }

    // ユーザーログアウト処理
    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }
}
