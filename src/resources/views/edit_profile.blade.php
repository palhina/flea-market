@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit_profile.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content') 
    <div class="register-profile__content">
            <div class="register-profile__group-title">
                <h1>プロフィール設定</h1>
            </div>
            <form class="form" action="/mypage/profile/{{$user->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="register__profile">
                    @if (strpos($user->img_url, '/images/') === 0)
                        <img class="profile__img" accept="image/*" src="{{ $user->img_url }}">
                    @elseif (strpos($user->img_url, 'profile/') === 0)
                        <img class="profile__img" accept="image/*" src="{{asset('storage/' . $user->img_url)}}">
                    @else
                        <img class="profile__img" accept="image/*" src="/images/icon/no_image.jpg">
                    @endif
                    <input class="profile__upload-btn" type="file" name="profile_img" accept=".jpg, .jpeg, .png, .gif">
                </div>    
                <div class="register__form-content">
                    <div class="form__input">
                        <p class="form__ttl">ユーザー名</p>
                        <div class="form__name">
                            <input type="text" name="name" value="{{ $user->name }}" />
                        </div>
                        <div class="form__error">
                            @if ($errors->has('name'))
                                {{$errors->first('name')}}
                            @endif
                        </div>
                    </div>
                    <div class="form__input">
                        <p class="form__ttl">郵便番号</p>
                        <div class="form__postcode">
                            <input type="text" name="postcode" value="@if($address !==null){{ $address->postcode }}@endif" />
                        </div>
                        <div class="form__error">
                            @if ($errors->has('postcode'))
                                {{$errors->first('postcode')}}
                            @endif
                        </div>
                    </div>
                    <div class="form__input">
                        <div class="form__address">
                            <p class="form__ttl">住所</p>
                            <input type="text" name="address" value="@if($address !==null){{ $address->address }}@endif"/>
                        </div>
                        <div class="form__error">
                            @if ($errors->has('address'))
                                {{$errors->first('address')}}
                            @endif
                        </div>
                    </div>
                    <div class="form__input">
                        <div class="form__building">
                            <p class="form__ttl">建物名</p>
                            <input type="text" name="building"  value="@if($address !==null){{ $address->building }}@endif"/>
                        </div>
                        <div class="form__error">
                            @if ($errors->has('building'))
                                {{$errors->first('building')}}
                            @endif
                        </div>
                    </div>
                    <div class="form__button">
                        <button class="form__button-register" type="submit">更新する</button>
                    </div>
                </div>
            </form>
        </div>
@endsection