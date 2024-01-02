@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="register__content">
        <div class="register__group-title">
            <h1>店舗代表者登録</h1>
        </div>
        
        @if(session('result'))
        <div class="flash_message">
            {{ session('result') }}
        </div>
        @endif
        
        <form class="form" action="/register/manager" method="post">
            @csrf
            <div class="register__form-content">
                <div class="form__name-input">
                    <p class="form__ttl">ショップ名</p>
                    <div class="form__name-text">
                        <input class="form__text" type="text" name="name" value="{{ old('name') }}" />
                    </div>
                    <div class="form__error">
                        {{$errors->first('name')}}
                    </div>
                </div>
                <div class="form__email-input">
                    <p class="form__ttl">メールアドレス</p>
                    <div class="form__email-text">
                        <input class="form__text" type="email" name="email" value="{{ old('email') }}"/>
                    </div>
                    <div class="form__error">
                        {{$errors->first('email')}}
                    </div>
                </div>
                <div class="form__pwd-input">
                    <div class="form__pwd-text">
                        <p class="form__ttl">パスワード</p>
                        <input class="form__text" type="password" name="password"/>
                    </div>
                    <div class="form__error">
                        {{$errors->first('password')}}
                    </div>
                </div>
                <div class="form__button">
                    <button class="form__button-register" type="submit">登録する</button>
                </div>
            </div>
        </form>
    </div>
@endsection