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
                @if (strpos($item->img_url, '/images/item/') === 0)
                    <img class="item__img" src="{{ $item->img_url }}">
                @elseif (strpos($item->img_url, 'item/') === 0)
                    <img class="item__img" src="{{asset('storage/' . $item->img_url)}}">
                @else
                    <img class="item__img" src="/images/icon/no_image.jpg">
                @endif
            </div>
        </div>
        <div class="item__contents-detail">
            <h1 class="item__contents-ttl">{{ $item->item_name }}</h1>
            <h2 class="item__contents-price">￥{{ $item->price }}</h2>
            <div class="item__contents-rating">
                @if(auth()->check() && auth()->user()->manager_id)
                @else
                    <div class="item__fav-add">
                        @if ($item->isFavorite)   
                            <form class="fav__delete" method="post" action="/favorite_delete/{{ $item->id }}">
                                @method('DELETE')
                                @csrf
                                <button class="fav-btn__favorite" type="submit">
                                    <img class="rating__fav-icon" alt="favorite" src="/images/icon/star-fav.png" />
                                </button>
                            </form>
                        @else
                            <form  class="fav__add" method="post" action="/favorite_add/{{ $item->id }}">
                                @csrf
                                <button class="fav-btn__not" type="submit">
                                    <img class="rating__fav-icon" alt="notFavorite" src="/images/icon/star.png" />
                                </button>
                            </form>
                        @endif
                        <p class="item__fav-number"> {{ $favoriteCount }}</p>
                    </div>
                @endif
                <div class="item__rating">
                    <form  class="item__comment" method="get" action="/comment/{{$item->id}}">
                        @csrf
                        <button class="comment-btn" type="submit">
                            <img class="rating__comment-icon" alt="Comment" src="/images/icon/comment.png" />
                        </button>
                    </form>
                    <p class="item__fav-number"> {{ $commentCount }}</p>
                </div>        
            </div>
            @if(auth()->check() && auth()->user()->manager_id)
            @else
                @if ($item->isBought)
                    <p class="item__purchased">売り切れ</p>
                @else
                    <form class="item__contents-buy" action="/purchase/{{ $item->id }}" method="get">
                        @csrf
                        <button class="item__buy-btn">購入する</button>
                    </form>
                @endif
            @endif
            <div class="item__desc-wrapper">
                <h2 class="item__contents-desc">商品説明</h2>
                <p class="item__contents-text">{{ $item->description }}</p>
            </div>
            <div class="form__tag-wrapper">
                <h2 class="item__tag-ttl">商品の情報</h2>
                <table class="item__tag-table">
                    <tr class="item__tag-row">    
                        <th class="item__tag-header">カテゴリー</th>
                        @foreach($categories as $categoryItem)
                        <td  class="item__tag-desc">
                            <p class="item__tag-category">
                                {{$categoryItem->category->category_name}}
                            </p>
                        </td>
                        @endforeach
                    </tr>
                    <tr class="item__tag-row">
                        <th class="item__tag-header">商品の状態</th>
                        <td class="item__tag-desc">{{ $item->condition->condition_name}}</td>
                    </tr>    
                </table>
            </div>
        </div>
    </div>
@endsection