@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage_sell.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content') 
    <div class="item-list__wrapper">
        <div class ="item__profile">
            <div class="item__profile--content">
                <div class="item__profile--img">
                    @if (strpos($user->img_url, '/images/profile/') === 0)
                        <img class="profile__img" accept="image/*" src="{{ $user->img_url }}">
                    @elseif (strpos($user->img_url, 'profile/') === 0)
                        <img class="profile__img" accept="image/*" src="{{asset('storage/' . $user->img_url)}}">
                    @else
                        <img class="profile__img" accept="image/*" src="/images/icon/no_image.jpg">
                    @endif
                </div>    
                <div class="item__profile-data">
                    <p class="form__ttl">
                        @if($user->name !== null)
                        {{ $user->name }}様
                        @else
                        ユーザー名が未入力です
                        @endif
                    </p>

                </div>
            </div>
            <div class="item__profile-edit">
                <form class="form" action="/mypage/profile/{{ $user->id }}" method="get">
                @csrf
                    <button class="profile__edit-btn">プロフィールを編集</button>
                </form>
            </div>
        </div>    
        <div class="item-all__list--wrapper">
            <div class="item-all__list">
                <form class="form" action="/mypage" method="get">
                    @csrf
                    <button class="item__list--sell">出品した商品</button>
                </form>
            </div>
            <div class="item-all__list">
                <form class="form" action="/mypage/buy" method="get">
                    @csrf
                    <button class="item__list--buy">購入した商品</button>
                </form>
            </div>
        </div>
        <div class="item-all">
            @foreach($items as $item) 
            <div class="item-all__card">
                <form class="form" action="/item/{{ $item->id}}" method="get">
                    @csrf
                    @if (strpos($item->img_url, '/images/item/') === 0)
                        <input class="card__img" type="image" id="image" alt="Item" src="{{ $item->img_url }}" />
                    @elseif (strpos($item->img_url, 'item/') === 0)
                        <input class="card__img" type="image" id="image" alt="Item" src="{{asset('storage/' . $item->img_url)}}" />
                    @else
                        <input class="card__img" type="image" id="image" alt="Item" src="/images/icon/no_image.jpg" />
                    @endif
                </form>
            </div>
            @endforeach
        </div>
    </div>
@endsection