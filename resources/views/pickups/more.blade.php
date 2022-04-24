@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-4">
    <div class="arrow mb-3">
        <a href="{{ route ('pickups') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
            </svg>
        </a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @foreach($carts as $cart)
                <div class="card-header">Заказ № {{$cart->id}} от {{\Carbon\Carbon::parse($cart->created_at)->format('d.m.Y H:i:s ')}}</div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($cart->cart_data as $el)
                        <div class="col-sm-2 mt-2 mb-2">Наименование: <br>
                            {{$el->name}}
                        </div>
                        <div class="col-sm-2 mt-2 mb-2">Количество: <br>
                            {{$el->quantity}} шт
                        </div>
                        <div class="col-sm-2 mt-2 mb-2">Цена: <br>
                            {{$el->price}} р
                        </div>
                        @endforeach
                        <hr class="featurette-divider">
                        <div class="col-sm-2 mt-2 mb-2">Итоговая цена: <br>
                            {{$cart->total_sum}} р
                        </div>
                        <div class="col-sm-2 mt-2 mb-2">Способ оплаты: <br>
                            @if ($cart->pay == 1)
                            Оплата картой
                            @else
                            Оплата наличкой
                            @endif
                        </div>
                        <div class="col-sm-2 mt-2 mb-2">Номер телефона: <br>
                            {{$cart-> phone}}
                        </div>
                        <div class="col-sm-2 mt-2 mb-2">Статус: <br>
                            @if ($cart->status == 1)
                            <a href="{{ route ('ordersAddDone', $cart->id) }}"> <button type="button" class="btn btn-info">В работе</button></a>
                            @else
                            <a href="{{ route ('ordersAddWork', $cart->id) }}"><button type="button" class="btn btn-success">Выполнено</button></a>
                            @endif
                        </div>
                    </div>
                    <hr class="featurette-divider">
                    <div class="row">
                        <div class="col-sm-12 mt-2 mb-2">Комментарий: <br>
                            {{$cart-> comment}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection