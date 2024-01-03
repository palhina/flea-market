@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_menu.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content')
    <div class="menu__contents">
        <h1>こんにちは、{{ $admin->name }}さん</h1>
        <p>管理者権限でログイン中</p>
        <form  class="form" action="/delete/user" method="get">
            <button class="menu__select-btn" type="submit">利用者の削除</button>
        </form>
        <form  class="form" action="/check/transaction" method="get">
            <button class="menu__select-btn" type="submit">取引履歴確認</button>
        </form>
        <form  class="form" action="/send_email" method="get">
            <button class="menu__select-btn" type="submit">メール送信</button>
        </form>
        <form  class="form" action="/register/manager" method="get">
            <button class="menu__select-btn" type="submit">店舗代表者作成</button>
        </form>
    </div>
@endsection
