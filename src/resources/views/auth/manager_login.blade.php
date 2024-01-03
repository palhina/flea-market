@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="login__content">
        <div class="login__group-title">
            <h1>店舗代表者ログイン</h1>
        </div>
        
        @if(session('result'))
        <div class="flash_message">
            {{ session('result') }}
        </div>
        @endif
        
        <form class="form" action="/login/manager" method="post">
            @csrf
            <div class="login__form-content">
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
                    <button class="form__button-login" type="submit">ログインする</button>
                </div>
            </div>
        </form>
    </div>
@endsection