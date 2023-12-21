@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage_sell.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content') 
    <div class="item-list__wrapper">
        <div class="item-all__list">
            <form class="form" action="" method="get">
                <!-- csrf -->
                <button class="item__list--sell">出品した商品</button>
            </form>
        </div>
        <div class="item-all__list">
            <form class="form" action="" method="get">
                <!-- csrf -->
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
@endsection