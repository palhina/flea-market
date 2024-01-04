@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/check_transaction.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content')
    <div class="menu__contents">
        <h1 class="transaction-confirm__ttl">取引履歴確認</h1>
        <div class="transaction-confirm__wrapper">
            @foreach($data as $transactionData)
            <div class="transaction-confirm__list">
                <h2 class="transaction-confirm__manager">ショップ名：{{$transactionData['manager']->name}}</h2>
                @if ($transactionData['transactions']->isEmpty())
                    <p class="transaction-confirm__alart">取引履歴はありません</p>
                @else
                    <table class="transaction-confirm__table">
                        <tr>
                            <th class="transaction-confirm__header">購入日時</th>
                            <th class="transaction-confirm__header">購入者名</th>
                            <th class="transaction-confirm__header">購入者Email</th>
                            <th class="transaction-confirm__header">商品名</th>
                        </tr>
                        @foreach($transactionData['transactions'] as $transaction)
                        <tr class="transaction-confirm__row">
                            <td class="transaction-confirm__detail">{{$transaction->created_at}}
                            </td>
                            <td class="transaction-confirm__detail">
                                @if($transaction->user !== null)
                                    {{$transaction->user->name}}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="transaction-confirm__detail">
                                @if($transaction->user !== null)
                                    {{$transaction->user->email}}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="transaction-confirm__detail">{{$transaction->item->item_name}}</td>
                        </tr>
                        @endforeach
                    </table>
                @endif
            </div>
            @endforeach
        </div>
    </div>
@endsection
