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
        <div class="shop-list__wrapper">
            @foreach($data as $transactionData)
                <p>ショップ名：{{$transactionData['manager']->name}}</p>
                @if ($transactionData['transactions']->isEmpty())
                    <p>取引履歴はありません</p>
                @else
                    <table>
                        <tr>
                            <th>購入日時</th>
                            <th>購入者名</th>
                            <th>購入者メールアドレス</th>
                            <th>商品名</th>
                        </tr>
                        @foreach($transactionData['transactions'] as $transaction)
                        <tr>
                            <td>{{$transaction->created_at}}
                            </td> 
                            <td>{{$transaction->user->name}}</td>
                            <td>{{$transaction->user->email}}</td>
                            <td>{{$transaction->item->item_name}}</td>
                        </tr>
                        @endforeach
                    </table>
                @endif
            @endforeach
        </div>
    </div>
@endsection
