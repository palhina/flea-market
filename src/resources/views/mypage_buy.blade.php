@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage_buy.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content') 
    <div class="item-list__wrapper">
        <div class ="item__profile">
            <div class="item__profile--content">
                <div class="item__profile--img">
                    <img class="profile__img" id="img" accept="image/*" src="https://tool-engineer.work/wp-content/uploads/2022/06/default.png">
                </div>    
                <div class="item__profile-data">
                    <p class="form__ttl">{{ $user->name }}様</p>
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
            <!-- atforeach  -->
            <div class="item-all__card">
                <form class="form" action="" method="get">
                    <!-- csrf -->
                    <input class="card__img" type="image" id="image" alt="Item" src="sushi.jpg" />
                </form>
            </div>
            <!-- endforeach -->
        </div>
    </div>
@endsection