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
                        @if (strpos($item->img_url, '/images/item/') === 0)
                            <img class="item__img" src="{{ $item->img_url }}">
                        @elseif (strpos($item->img_url, 'item/') === 0)
                            <img class="item__img" src="{{asset('storage/' . $item->img_url)}}">
                        @else
                            <img class="item__img" src="/images/icon/no_image.jpg">
                        @endif
                    </div>
                    <div class="item__contents-info">
                        <h1 class="item__contents-ttl">{{$item->item_name}}</h1>
                        <p class="item__contents-price">￥{{$item->price}}</p>
                    </div>
                </div>
                <form action="/purchase/{{$item->id}}" method="post" id="form1">
                @csrf
                    <div class="item__contents-payment">
                        <h2>支払方法</h2>
                        @foreach($payments as $payment)
                        <div class="item__payment-btn">
                            <label>
                                <input class="payment" type="radio" name="payment" value="{{ (string) $payment->id}}" onchange="updatePaymentMethod(this)" form="form1">{{ $payment->payment_method }}
                            </label>
                        </div>
                        @endforeach
                        <div class="form__error">
                            @if ($errors->has('payment'))
                                {{$errors->first('payment')}}
                            @endif 
                        </div>
                    </div>
                </form>
                <div class="item__contents-address">
                    <div class="item__purchase-address">
                        <h2>配送先</h2>
                        <form action="/purchase/address/{{$item->id}}" method="get" id="form2">
                        @csrf
                            <input class="item__pay-btn" type="submit" value="変更する" form="form2" />
                        </form>
                    </div>
                    @if($userAddress)
                        <div class="item__contents-address">
                            <label>
                                <input type="radio" name="address" value="{{ $userAddress->id }}" form="form1">
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
                    <div class="form__error">
                        @if ($errors->has('address'))
                            {{$errors->first('address')}}
                        @endif 
                    </div>
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
                <form action="/purchase/{{$item->id}}" method="post" id="form1">
                    @csrf
                    <input class="item__buy-btn" type="submit" value="購入する" form="form1" />
                </form>
            </div>
    </div>
@endsection