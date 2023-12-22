@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sell_item.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content') 
    <div class="sell-item__wrapper">
        <div class="sell-item__group-title">
            <h1>商品の出品</h1>
        </div>
        <form class="form" action="" method="post">
        @csrf  
            <div class="sell-item__content">
                <div class="sell-item__group">
                    <h2 class="sell__item-img">商品画像</h2>
                </div>
                <div class="sell-title__form-img">
                    <input class="form__img"  type="file" name="item_img" accept="image/jpeg, image/png">
                </div>
            </div>
            <div class="sell-item__content">
                <div class="sell-title__form-content">
                    <div class="sell-item__group-detail">
                        <h2 class="sell__item-desc">商品の詳細</h2>
                    </div>
                    <div class="form__input">
                        <p class="form__ttl">カテゴリー</p>
                        <div class="form__category">
                            <input class="form__text" type="text" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="form__error">
                            <!-- errors->first('email') -->
                        </div>
                    </div>
                    <div class="form__input">
                        <p class="form__ttl">商品の状態</p>
                        <div class="form__category">
                            <input class="form__text" type="text" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="form__error">
                            <!-- errors->first('email') -->
                        </div>
                    </div>
                </div>
                <div class="sell-title__form-content">
                    <div class="sell-item__group-detail">
                        <h2 class="sell__item-name">商品名と説明</h2>
                    </div>
                    <div class="form__input">
                        <p class="form__ttl">商品名</p>
                        <div class="form__category">
                            <input class="form__text" type="text" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="form__error">
                            <!-- errors->first('email') -->
                        </div>
                    </div>
                    <div class="form__input">
                        <p class="form__ttl">商品の説明</p>
                        <div class="form__category">
                            <textarea class="form__comment" col="50" name="comment"></textarea>
                        </div>
                        <div class="form__error">
                            <!-- errors->first('email') -->
                        </div>
                    </div>
                </div>
                <div class="sell-title__form-content">
                    <div class="sell-item__group-detail">
                        <h2 class="sell__item-price">販売価格</h2>
                    </div>
                    <div class="form__input">
                        <p class="form__ttl">販売価格</p>
                        <div class="form__category">
                            <input class="form__text" type="text" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="form__error">
                            <!-- errors->first('email') -->
                        </div>
                    </div>
                </div>
                <div class="form__button">
                    <button class="form__button-sell" type="submit">出品する</button>
                </div>
            </div>    
        </form>
    </div>
@endsection