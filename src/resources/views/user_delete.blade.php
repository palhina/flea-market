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
        <h1>ユーザー削除</h1>
        <div class="user-list__wrapper">
            @if($users->isNotEmpty())
                @foreach($users as $user)
                    <div class="user__list">
                        <h2>ユーザー名:{{$user->name}}</h2>
                        <p>メールアドレス:{{$user->email}}</p>
                        @if(isset($user->manager_id))
                        <p>店舗名:{{$user->manager->name}}</p>
                        @endif
                    </div>
                    <form class="user__delete" method="post" action="/delete/user/{{ $user->id }}">
                        @method('DELETE')
                        @csrf
                        <button class="user__delete-btn" type="submit">×</button>
                    </form>
                @endforeach
            @else
            <p>ユーザーデータがありません</p>
            @endif
            </div>    
        </div>
    </div>
@endsection
