@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/item_detail.css') }}">
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
            <form class="item__contents-buy" action="" method="get">
                <!-- csrf -->
                <button class="item__buy-btn">購入する</button>
            </form>
            <div class="item__desc-wrapper">
                <h2 class="item__contents-desc">商品説明</h2>
                <p class="item__contents-text">ここに説明を挿入</p>
            </div>
            <div class="form__tag-wrapper">
                <h2 class="item__tag-ttl">商品の情報</h2>
                <table class="item__tag-table">
                    <tr class="item__tag-row">    
                        <th class="item__tag-header">カテゴリー</th>
                        <td  class="item__tag-desc">メンズ</td>
                        <td  class="item__tag-desc">洋服</td>
                    </tr>
                    <tr class="item__tag-row">
                        <th class="item__tag-header">商品の状態</th>
                        <td class="item__tag-desc">良好</td>
                    </tr>    
                </table>
            </div>
        </div>
    </div>
@endsection