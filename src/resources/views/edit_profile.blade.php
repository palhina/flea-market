@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit_profile.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content') 
    <div class="edit-profile__content">
            <div class="edit-profile__group-title">
                <h1>プロフィール設定</h1>
            </div>
            <form class="form" action="/mypage/profile/{{$user->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="edit__profile">
                    @if (strpos($user->img_url, '/images/profile/') === 0)
                        <img class="profile__img" accept="image/*" src="{{ $user->img_url }}">
                    @elseif (strpos($user->img_url, 'profile/') === 0)
                        <img class="profile__img" accept="image/*" src="{{asset('storage/' . $user->img_url)}}">
                    @else
                        <img class="profile__img" accept="image/*" src="/images/icon/no_image.jpg">
                    @endif
                    <label class="profile-img__upload">
                        画像を選択する
                        <input class="profile__upload-btn" type="file" name="profile_img" accept=".jpg, .jpeg, .png">
                    </label>
                </div>    
                <div class="edit__form-content">
                    <div class="form__input">
                        <p class="form__ttl">ユーザー名</p>
                        <div class="form__name">
                            <input class="form__text" type="text" name="name" value="{{ $user->name }}" />
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
                            <input class="form__text" type="text" name="postcode" value="@if($address !==null){{ $address->postcode }}@endif" />
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
                            <input class="form__text" type="text" name="address" value="@if($address !==null){{ $address->address }}@endif"/>
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
                            <input class="form__text" type="text" name="building"  value="@if($address !==null){{ $address->building }}@endif"/>
                        </div>
                        <div class="form__error">
                            @if ($errors->has('building'))
                                {{$errors->first('building')}}
                            @endif
                        </div>
                    </div>
                    <div class="form__button">
                        <button class="form__button-edit" type="submit">更新する</button>
                    </div>
                </div>
            </form>
        </div>
@endsection