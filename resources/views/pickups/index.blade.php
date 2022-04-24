@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="center">
        <h1>Самовывоз</h1>
    </div>
    @include('inc.messages')
    <div class="row">
        <div class="col-sm-4">
            <a href="{{ route ('pickups') }}" class="alert-link">Все заказы</a>
        </div>
        <div class="col-sm-4">
            <a href=" {{ route ('pickupsWork') }}" class="alert-link">В работе</a>
        </div>
        <div class="col-sm-4">
            <a href=" {{ route ('pickupsDone') }}" class="alert-link">Выполненые</a>
        </div>
    </div>
    <ul class="list1a">
        @foreach($carts as $cart)
        <li>
            <div class="row">
                <div class="col-sm-2 mt-2 mb-2">Номер заказа и время: <br>
                    {{$cart->id}} от {{\Carbon\Carbon::parse($cart->created_at)->format('H:i d.m.Y')}}
                </div>
                <div class="col-sm-2 mt-2 mb-2">Сумма заказа: <br>
                    {{$cart->total_sum}} рублей
                </div>
                <div class="col-sm-2 mt-2 mb-2">Способ оплаты: <br>
                    @if ($cart->pay == 1)
                    Оплата картой
                    @else
                    Оплата наличкой
                    @endif
                </div>
                <div class="col-sm-2 mt-2 mb-2">Номер телефона: <br>
                    {{$cart->phone}}
                </div>
                <div class="col-sm-2 mt-2 mb-2">Статус: <br>
                    @if ($cart->status == 1)
                    <a href=" {{ route ('pickupsAddDone', $cart->id) }}"> <button type="button" class="btn btn-info">В работе</button></a>
                    @else
                    <a href=" {{ route ('pickupsAddWork', $cart->id) }}"><button type="button" class="btn btn-success">Выполнено</button></a>
                    @endif
                </div>
                <div class="col-sm-1 mt-2 mb-2">
                    <a href=" {{ route ('pickupsMore', $cart->id) }}"><button type="button" class="btn btn-primary">Подробнее</button></a>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection