@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/send_email.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content')
    @if (session('result'))
        <div class="flash_message">
            {{ session('result') }}
        </div>
    @endif
    <div class="information-email__wrapper">
        <h2 class="information-email__detail">メール送信</h2>
        <p>ユーザーにメールを送信します</p>
        <form method="post" action="/send_email">
        @csrf
            <div>
                <select class="email-address__select" name="email_address">
                    <option value="">送信先を選択</option>
                    <option value="customer">一般ユーザー</option>
                    <option value="staff">ショップスタッフ</option>
                    <option value="all">一般ユーザー・ショップスタッフ</option>
                </select>
                <div class="form__error">
                    {{$errors->first('email_address')}}
                </div>
            </div>
            <div class="information-email__content">
                <div class="information-email__ttl">
                    <input class="information-email__subject" type="text" name="subject" placeholder="タイトル" value="{{ old('subject') }}"/>
                    <div class="form__error">
                        {{$errors->first('subject')}}
                    </div>
                </div>
                <div class="information-email__text">
                    <textarea class="information-email__message" name="message" placeholder="メール本文" value="{{ old('message') }}"></textarea> 
                    <div class="form__error">
                        {{$errors->first('message')}}
                    </div>
                </div>
                <div class="information-email__btn">    
                    <button class="send-email__btn" type="submit">メールを送信する</button>
                </div>
            </div>
        </form>
    </div>
@endsection