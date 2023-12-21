@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content') 
    <div class="item-detail__wrapper">
            <div class="item__contents">
                <div class="item__contents-img">
                    <img class="item__img" src="sushi.jpg">
                </div>
            </div>
            <div class="item__contents-detail">
                <h1 class="item__contents-ttl">商品名</h1>
                <h2 class="item__contents-price">￥47,000</h2>
                <div class="item__contents-rating">
                    <div class="item__rating">
                        <img src="" alt="favorite">
                        <p class="item__fav-number">3</p>
                    </div>
                    <div class="item__rating">
                        <img src="" alt="comment">
                        <p class="item__fav-number">14</p>
                    </div>
                </div>
                <!-- atforeach -->
                <div class="item__rate-comment">
                    <div class="rate__profile">
                        <img class="rate__profile-photo" src="" alt="profile">
                        <p class="rate__profile-name">名前</p>
                    </div>
                    <div class="rate__comments">
                        <p>コメント</p>
                    </div>
                </div>
                <!-- endforeach -->
                <form class="item__contents-rate" action="" method="post">
                    <!-- csrf -->
                    <p>商品へのコメント</p>
                    <textarea class="form__rate-comment" col="50" name="comment"></textarea>
                    <button class="item__rate-btn">コメントを送信する</button>
                </form>
            </div>
        </div>
@endsection