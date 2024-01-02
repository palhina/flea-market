@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_menu.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content')
    @if(session('result'))
        <div class="flash_message">
            {{ session('result') }}
        </div>
    @endif
    <div class="menu__contents">
        <h1>こんにちは、{{ $manager->name }}さん</h1>
        <p>店舗代表者権限でログイン中</p>
        <form  class="form" action="/register/staff" method="get">
            <button class="menu__select-btn" type="submit">ショップスタッフ招待
            </button>
        </form>
        <form  class="form" action="/delete/staff" method="get">
            <button class="menu__select-btn" type="submit">ショップスタッフ削除</button>
        </form>
    </div>
@endsection
