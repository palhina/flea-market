@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/user_delete.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content')
    <div class="menu__contents">
        @if(session('result'))
            <div class="flash_message">
                {{ session('result') }}
            </div>
        @endif
        <h1>スタッフ削除</h1>
        <div class="user-list__wrapper">
            <h2>店舗：{{ $managerName }}</h2>
            @if($users->isNotEmpty())
                @foreach($users as $user)
                    <div class="user__list">
                        <h3>スタッフ名:{{$user->name}}</h3>
                        <p>メールアドレス:{{$user->email}}</p>
                    </div>
                    <form class="user__delete" method="post" action="/delete/staff/{{ $user->id }}">
                        @method('DELETE')
                        @csrf
                        <button class="user__delete-btn" type="submit">×</button>
                    </form>
                @endforeach
            @else
            <p>スタッフデータがありません</p>
            @endif
            </div>    
        </div>
    </div>
@endsection
