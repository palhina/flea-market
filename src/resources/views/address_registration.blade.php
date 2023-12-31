@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/address_registration.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content') 
    <div class="register-address__content">
        <div class="register-address__group-title">
            <h1>住所の変更</h1>
        </div>
        <form class="form" action="/purchase/address/{{ $user->id }}" method="post">
            @csrf
            <div class="register__form-content">
                <div class="form__input">
                    <p class="form__ttl">郵便番号</p>
                    <div class="form__postcode">
                        <input class="form__text" type="text" name="postcode" value="{{ old('postcode') }}" />
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
                        <input class="form__text" type="text" name="address" value="{{ old('address') }}"/>
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
                        <input class="form__text" type="text" name="building" />
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