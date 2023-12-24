@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/items_recommend.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content')
   <div class="item-list__wrapper">
        <div class="item-all__list">
            <form class="form" action="/" method="get">
                @csrf
                <button class="item__list--recommend">おすすめ</button>
            </form>
        </div>
        <div class="item-all__list">
            <form class="form" action="/item/favorite" method="get">
                @csrf
                <button class="item__list--favorite">マイリスト</button>
            </form>
        </div>
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
