@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    @include('inc.messages')
    <div class="row">
        <div class="col-12 col-md-4">
            @php
            $image = '';
            if(count($products->images) > 0) {
            $image = $products->images[0]['img'];
            } else {
            $image = 'no_image.jpg';
            }
            @endphp
            <img src="\img\{{$image}}" class="card-img-top" alt="">
        </div>
        <div class="col-12 col-md-4">
            @if ($products->in_stock == 1)
            <div class="cart_button">
                <!-- <a href="{{ route('addToCart')}}"> -->
                <button type="button" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                        <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                    </svg>
                    Добавить в корзину
                </button>
                <!-- </a> -->
            </div>
            @endif
            <h1>
                <div class="details_name" data-id="{{$products->id}}">{{$products->title}}</div>
            </h1>
            @if ($products->in_stock == 1)
            <h6 class="green">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                </svg>
                В наличии
            </h6>
            @else
            <h6 class="red">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg>
                Нет в наличии
            </h6>
            @endif
            <h6>{{$products->price}}р</h6>
            <small>{{$products->description}}</small>
            <br>
            <small>
                Состав:
                <ul>
                    @if ($products->composition1 != null)
                    <li>{{$products->composition1}} </li>
                    @endif
                    @if ($products->composition2 != null)
                    <li>{{$products->composition2}} </li>
                    @endif
                    @if ($products->composition3 != null)
                    <li>{{$products->composition3}} </li>
                    @endif
                    @if ($products->composition4 != null)
                    <li>{{$products->composition4}} </li>
                    @endif
                </ul>
            </small>
        </div>
    </div>
</div>
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