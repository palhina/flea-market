@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/items_recommend.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content')
    @if(session('result'))
        <div class="flash_message">
            {{ session('result') }}
        </div>
    @endif
    
    <div class="item-list__wrapper">
        <div class="item-all__list">
            <form class="form" action="/" method="get">
                @csrf
                <button class="item__list--recommend">おすすめ</button>
            </form>
        </div>
        @if(auth()->check() &&auth()->user()->manager_id)
        @else
        <div class="item-all__list">
            <form class="form" action="/item/favorite" method="post">
                @csrf
                <button class="item__list--favorite">マイリスト</button>
            </form>
        </div>
        @endif
    </div>
    <div class="item-all">
        @foreach($items as $item)
        <div class="item-all__card">
            <form class="form" action="/item/{{$item->id}}" method="get">
                @csrf
                @if (strpos($item->img_url, '/images/item/') === 0)
                    <input class="card__img" type="image" id="image" alt="Item" src="{{ $item->img_url }}" />
                @elseif (strpos($item->img_url, 'item/') === 0)
                    <input class="card__img" type="image" id="image" alt="Item" src="{{asset('storage/' . $item->img_url)}}" />
                @else
                    <input class="card__img" type="image" id="image" alt="Item" src="/images/icon/no_image.jpg" />
                @endif
            </form>
        </div>
        @endforeach
    </div>
@endsection
