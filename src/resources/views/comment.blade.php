@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content') 
    <div class="item-detail__wrapper">
        @if (session('result'))
        <div class="flash_message">
            {{ session('result') }}
        </div>
        @endif
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
                @if(!auth()->user()->manager_id)
                <div class="item__rating">
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
                    <p class="item__fav-number">{{ $favoriteCount }}</p>
                </div>
                @endif
                <div class="item__rating">
                    <form  class="item__comment" method="get" action="/comment/{{$item->id}}">
                        @csrf
                        <button class="comment-btn" type="submit">
                            <img class="rating__comment-icon" alt="Comment" src="/images/icon/comment.png" />
                        </button>
                    </form>
                    <p class="item__fav-number">{{ $commentCount }}</p>
                </div>
            </div>

            @foreach($comments as $singleComment)
            <div class="item__rate-comment">
                <div class="@if($singleComment->user->id === Auth::user()->id) rate__profile-user @else rate__profile @endif">
                    @if (strpos($singleComment->user->img_url, '/images/profile/') === 0)
                        <img class="rate__profile-photo" accept="image/*" src="{{ $singleComment->user->img_url }}">
                    @elseif (strpos($singleComment->user->img_url, 'profile/') === 0)
                        <img class="rate__profile-photo" accept="image/*" src="{{asset('storage/' . $singleComment->user->img_url)}}">
                    @else
                        <img class="rate__profile-photo" accept="image/*" src="/images/icon/no_image.jpg">
                    @endif
                    <p class="rate__profile-name">{{ $singleComment->user->name }}</p>
                </div>
                <p class="rate__comments">{{ $singleComment->comment }}</p>
                @if($singleComment->user_id === auth()->user()->id)
                    <form class="comment__delete" method="post" action="/comment/delete/{{ $singleComment->id }}">
                        @method('DELETE')
                        @csrf
                        <button class="comment__delete--btn" type="submit">×</button>
                    </form>
                @endif
            </div>
            @endforeach

            <form class="item__contents-rate" action="/comment/{{$item->id}}" method="post">
                @csrf
                <p>商品へのコメント</p>
                <textarea class="form__rate-comment" col="50" name="comment"></textarea>
                <div class="form__error">
                    @if ($errors->has('comment'))
                        {{$errors->first('comment')}}
                    @endif 
                </div>
                <button class="item__rate-btn">コメントを送信する</button>
            </form>
        </div>
    </div>
@endsection