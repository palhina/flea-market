<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Manager;
use App\Models\Admin;
use Illuminate\Routing\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\AccountCreationRequest;
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
        return redirect('/login')->with('result', '新規登録に成功しました');
    }

    // ユーザーログインページ表示
    public function login()
    {
        return view('auth.login');
    }

    // ユーザーログイン処理
    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))
        {
            return redirect('/')->with('result', 'ログインしました');
        } 
        else {
            return redirect('/login')->with('result', 'メールアドレスまたはパスワードが違います');
        }
    }

    // ユーザーログアウト処理
    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }




    // 以下追加実装
    // 管理者新規登録ページ表示
    public function adminRegister()
    {
        return view('auth.admin_register');
    }

    // 管理者新規登録処理
    public function postAdminRegister(AccountCreationRequest $request)
    {   
        Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('/login/admin')->with('result', '管理者アカウントの作成に成功しました');
    }

    // 管理者ログインページ表示
    public function adminLogin()
    {
        return view('auth.admin_login');
    }

    // 管理者ログイン処理
    public function postAdminLogin(LoginRequest $request)
    {
        if (Auth::guard('admins')->attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect('/menu/admin')->with('result', '管理者ログインに成功しました');
        } else {
            return redirect('/login/admin')->with('result', 'メールアドレスまたはパスワードが違います');
        }
    }

    // 管理者ログアウト処理
    public function adminLogout()
    {
        Auth::guard('admins')->logout();
        return redirect('/login/admin')->with('result', 'ログアウトしました');
    }

    // 店舗代表者新規登録ページ表示
    public function managerRegister()
    {
        return view('auth.manager_register');
    }

    // 店舗代表者新規登録処理
    public function postManagerRegister(AccountCreationRequest $request)
    {   
        Manager::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('/menu/admin')->with('result', '店舗代表者アカウントの作成に成功しました');
    }

    // 店舗代表者ログインページ表示
    public function managerLogin()
    {
        return view('auth.manager_login');
    }

    // 店舗代表者ログイン処理
    public function postManagerLogin(LoginRequest $request)
    {
        if (Auth::guard('managers')->attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect('/menu/manager')->with('result', '店舗代表者ログインに成功しました');
        } else {
            return redirect('/login/manager')->with('result', 'メールアドレスまたはパスワードが違います');
        }
    }

    // 店舗代表者ログアウト
    public function managerLogout()
    {
        Auth::guard('managers')->logout();
        return redirect('/login/manager')->with('result', 'ログアウトしました');
    }

    // ショップスタッフ招待ページ表示
    public function staffRegister()
    {
        return view('auth.staff_register');
    }

    // ショップスタッフ登録処理
    public function poststaffRegister(AccountCreationRequest $request)
    {   
        $managerId = Auth::guard('managers')->id();
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'manager_id' => $managerId,
        ]);
        return redirect('/menu/manager')->with('result', 'ショップスタッフの招待に成功しました');
    }
}


