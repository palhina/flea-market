@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/redirect_edit_profile.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content')
    <div class="error__contents">
        <h1>error</h1>
        <p>既に住所は登録されています</p>
        <form  class="form" action="/purchase/address/{{ $user->id }}" method="get">
            <button class="address__edit-btn" type="submit">住所変更はこちらから</button>
        </form>
    </div>
@endsection
