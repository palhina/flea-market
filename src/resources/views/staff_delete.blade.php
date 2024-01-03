@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/staff_delete.css') }}">
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
        <h1 class="staff-list__ttl">スタッフ削除</h1>
        <h2 class="staff-list__manager">店舗：{{ $managerName }}</h2>
        <div class="staff-list__wrapper">
            @if($users->isNotEmpty())
                @foreach($users as $user)
                    <div class="staff__list">
                        <h3>スタッフ名:{{$user->name}}</h3>
                        <p>メールアドレス:{{$user->email}}</p>
                        <form class="user__delete" method="post" action="/delete/staff/{{ $user->id }}">
                            @method('DELETE')
                            @csrf
                            <button class="staff__delete-btn" type="submit">×</button>
                        </form>
                    </div>
                @endforeach
            @else
            <p class="staff__alart">スタッフデータがありません</p>
            @endif
            </div>    
        </div>
    </div>
@endsection
