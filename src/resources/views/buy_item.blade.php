@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/buy_item.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content') 
    <div class="item-buy__wrapper">
            <div class="item__contents-detail">
                <div class="item__contents">
                    <div class="item__contents-img">
                        <img class="item__img" src="sushi.jpg">
                    </div>
                    <div class="item__contents-info">
                        <h1 class="item__contents-ttl">商品名</h1>
                        <p class="item__contents-price">￥47,000</p>
                    </div>
                </div>
                <div class="item__contents-pay">
                    <h2>支払方法</h2>
                    <button class="item__pay-btn">変更する</button>    
                </div>
                <div class="item__contents-pay">
                    <h2>送付先</h2>
                    <button class="item__pay-btn">変更する</button>
                </div>
            </div>
            <div class="item__pay-wrapper">
                <div class="item__desc-wrapper">
                    <!-- javascript挿入？選択した支払方法の反映を行う -->
                    <table class="item__pay-table">
                        <tr class="item__pay-row">
                            <th class="item__pay-header">商品代金</th>
                            <td class="item__pay-desc">￥47,000</td>
                        </tr>
                        <tr class="item__pay-row">
                            <th class="item__pay-header">支払金額</th>
                            <td class="item__pay-desc">￥47,000</td>
                        </tr>
                        <tr class="item__pay-row">
                            <th class="item__pay-header">支払方法</th>
                            <td class="item__pay-desc">コンビニ払い</td>
                        </tr>
                    </table>
                </div>
                <form class="item__contents-buy" action="" method="get">
                    <!-- csrf -->
                    <button class="item__buy-btn">購入する</button>
                </form>
            </div>
        </div>
@endsection