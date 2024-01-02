@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/check_transaction.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content')
    <div class="menu__contents">
        <h1>取引履歴確認</h1>
        <div class="user-list__wrapper">       
        </div>
    </div>
@endsection
