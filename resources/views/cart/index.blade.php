@extends('layouts.app')

@section('content')
@php
$total = (isset($_COOKIE['cart_id']) ? \Cart::session($_COOKIE['cart_id'])->getTotalQuantity() : '0');
@endphp
<div class="center">
    <h1>
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </svg>
        Корзина
    </h1>
    @if ($total >= 1) <a href="{{ route ('clearCart') }}">
        <button type="button" class="btn btn-outline-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-x" viewBox="0 0 16 16">
                <path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z" />
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
            </svg>
            Очистить корзину
        </button>
    </a>
    @endif
</div>
<div class="container mt-5 mb-5">
    @if ($total < 1) <div class="center">
        <h3>Ваша корзина пуста</h3>
        <a href="{{ route ('home') }}">
            <small>Перейти в меню </small>
        </a>
</div>
@else
@include('inc.messages')
@foreach ($product as $el)
@php
$con = $el->price*$el->quantity;
@endphp
<div class="row">
    <div class="col-12 col-md-4">
        <img src="\img\{{$el->attributes->img}}" class="d-block w-100 mb-3 " alt="...">
    </div>
    <div class="col-12 col-md-4">
        <h5>{{$el->name}}</h5>
        <small>
            <div class="quantity">
                Количество:
                <a href="{{ route ('deleteOneToCart', [ 'id' => $el -> id]) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                    </svg>
                </a>
                <small> {{$el->quantity}}</small>
                <a href="{{ route ('addOneToCart', [ 'id' => $el -> id]) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </a>
                <a href="{{ route ('deleteToCart', [ 'id' => $el -> id]) }}">
                    <button type="button" class="btn btn-outline-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-dash" viewBox="0 0 16 16">
                            <path d="M6.5 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z" />
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                        </svg>
                    </button>
                </a>
            </div>
        </small>
        <small>Цена: {{$el->price}}</small> <br>
        <small>Цена итого: {{$con}}</small> <br>
        <small>Описание: {{$el->attributes->description}}</small>
    </div>
</div>
@endforeach
@endif
</div>
@if ($total > 0)
<div class="container ">
    <div class="center">
        <h5 class="mt-3 mb-3">Итогая сумма:
            {{$sum}}
        </h5>
        <a href="{{ route ('cartDelivery') }}">

            <button type="button" class="btn btn-primary mt-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                </svg>
                Оформить заказ
            </button>
        </a>
    </div>
</div>
@endif
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('.cart_button').click(function(event) {
            event.preventDefault()
            addToCart()
        })
    })

    function addToCart() {
        let id = $('.details_name').data('id')
        let qty = 1
        let total_qty = parseInt($('.cart-qty').text())
        total_qty += qty
        $('.cart-qty').text(total_qty)
        console.log(total_qty)
        $.ajax({
            url: "{{route('addToCart')}}",
            type: "POST",
            data: {
                id: id,
                qty: 1,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                console.log(data)
            },
            error: (data) => {
                console.log(data)
            }
        });
    }
</script>
@endsection