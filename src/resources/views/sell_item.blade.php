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
        <form class="form" action="/sell/{$user->id}" method="post" enctype="multipart/form-data">
        @csrf  
            <div class="sell-item__content">
                <div class="sell-item__group">
                    <h2 class="sell__item-img">商品画像</h2>
                </div>
                <div class="sell-title__form-img">
                    <input class="form__img"  type="file" name="item_img" accept="image/jpeg, image/png">
                </div>
            </div>
            <div class="form__error">
                @if ($errors->has('item_img'))
                    {{$errors->first('item_img')}}
                @endif
            </div>
            <div class="sell-item__content">
                <div class="sell-title__form-content">
                    <div class="sell-item__group-detail">
                        <h2 class="sell__item-desc">商品の詳細</h2>
                    </div>
                    <div class="form__input">
                        <p class="form__ttl">カテゴリー(１つ以上選択)</p>
                        <select class="form__category" name="category_name">
                            <option value="">カテゴリーを選択(必須)</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach   
                        </select>
                        <select class="form__category" name="category_name2">
                            <option value="">カテゴリーを選択(任意)</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach   
                        </select>
                        <div class="form__error">
                            @if ($errors->has('category_name'))
                                {{$errors->first('category_name')}}
                            @endif
                        </div>
                    </div>
                    <div class="form__input">
                        <p class="form__ttl">商品の状態</p>
                        <select class="form__category" name="condition_name">
                            <option value="">状態を選択</option>
                            @foreach($conditions as $condition)
                            <option value="{{ $condition->id }}">{{ $condition->condition_name }}</option>
                            @endforeach   
                        </select>
                        <div class="form__error">
                            @if ($errors->has('condition_name'))
                                {{$errors->first('condition_name')}}
                            @endif
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
                            @if ($errors->has('name'))
                                {{$errors->first('name')}}
                            @endif
                        </div>
                    </div>
                    <div class="form__input">
                        <p class="form__ttl">商品の説明</p>
                        <div class="form__category">
                            <textarea class="form__comment" col="50" name="comment">{{ old('comment') }}</textarea>
                        </div>
                        <div class="form__error">
                            @if ($errors->has('comment'))
                                {{$errors->first('comment')}}
                            @endif
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
                            <input class="form__text" type="text" name="price" value="{{ old('price') }}" />
                        </div>
                        <div class="form__error">
                            @if ($errors->has('price'))
                                {{$errors->first('price')}}
                            @endif
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