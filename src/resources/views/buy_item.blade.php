@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/buy_item.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/payment.js') }}"></script>
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content') 
    <div class="item-buy__wrapper">
        <div class="item__contents-detail">
            <div class="item__contents">
                <div class="item__contents-img">
                    <img class="item__img" src="{{$item->img_url}}">
                </div>
                <div class="item__contents-info">
                    <h1 class="item__contents-ttl">{{$item->item_name}}</h1>
                    <p class="item__contents-price">￥{{$item->price}}</p>
                </div>
            </div>

            <div class="item__contents-payment">
                <h2>支払方法</h2>
                @foreach($payments as $payment)
                <div class="item__payment-btn">
                    <input class="payment" type="radio" name="payment" value="{{ $payment->payment_method}}" onchange="updatePaymentMethod(this)" required>{{ $payment->payment_method }}
                </div>
                @endforeach
            </div>
            <div class="item__contents-address">
                <div class="item__purchase-address">
                    <h2>配送先</h2>
                    <form action="/address/{{$item->id}}" method="get">
                    @csrf
                        <button class="item__pay-btn">変更する</button>
                    </form>
                </div>
                @if($userAddress)
                    <div class="item__contents-address">
                        <label>
                            <input type="radio" name="selected_address" value="{{ $userAddress->id }}" required>
                            <div class="user__address">
                            <p>〒{{ $userAddress->postcode }}</p>
                            <p>{{ $userAddress->address }}</p>
                            <p>{{ $userAddress->building }}</p>
                            </div>
                        </label>    
                    </div>
                @else
                    <p>住所は登録されていません。</p>
                @endif
            </div>
        </div>
        <div class="item__pay-wrapper">
            <div class="item__desc-wrapper">
                <table class="item__pay-table">
                    <tr class="item__pay-row">
                        <th class="item__pay-header">商品代金</th>
                        <td class="item__pay-desc">￥{{$item->price}}</td>
                    </tr>
                    <tr class="item__pay-row">
                        <th class="item__pay-header">支払金額</th>
                        <td class="item__pay-desc">￥{{$item->price}}</td>
                    </tr>
                    <tr class="item__pay-row">
                        <th class="item__pay-header">支払方法</th>
                        <td class="item__pay-desc" id="selectedPayment">コンビニ払い</td>
                    </tr>
                </table>
            </div>
            <form action="/purchase/{{$item->id}}" method="post">
                <button class="item__buy-btn" type="submit">購入する</button>
            </form>
        </div>
    </div>
@endsection