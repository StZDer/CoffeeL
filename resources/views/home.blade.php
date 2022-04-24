@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-4">
    @include('inc.messages')
    <p>Показано: {{$products->count()}} результатов</p>
    <div class="right">
        <div class="btn-group">
            <button type="button" class="btn btn-secondary  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Сортировать
            </button>
            <ul class="dropdown-menu">
                <li class="product_sorting_btn" data-order="default"><a class="dropdown-item" href="#">По умолчанию</a></li>
                <li class="product_sorting_btn" data-order="prise-high-low"><a class="dropdown-item" href="#">По цене: От меньшего к большему</a></li>
                <li class="product_sorting_btn" data-order="prise-low-high"><a class="dropdown-item" href="#">По цене: От большего к меньшему</a></li>
                <li class="product_sorting_btn" data-order="name-a-z"><a class="dropdown-item" href="#">По имени: От А до Я</a></li>
                <li class="product_sorting_btn" data-order="name-z-a"><a class="dropdown-item" href="#">По имени: От Я до А</a></li>
            </ul>
        </div>
    </div>
    <div class="sorting">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($products as $el)
            <div class="col">
                <div class="card shadow-sm">
                    @php
                    $image = '';
                    if(count($el->images) > 0) {
                    $image = $el->images[0]['img'];
                    } else {
                    $image = 'no_image.jpg';
                    }
                    @endphp
                    <img src="\img\{{$image}}" class="d-block w-100 " alt="...">
                    <div class="center">
                        <div class="details_name" data-id="{{$el->id}}">{{$el->title}}</div>
                        {{$el->category['title']}}
                        @guest
                        @else
                        @if ((Auth::user()->group == 3)&&($el -> in_stock == 2))
                        <a href="{{ route ('products-instock', $el -> id) }}"><button type="button" class="btn mt-1 btn-sm btn-outline-danger">Нет в наличии</button></a>
                        @endif
                        @endguest
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$el -> description}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route ('products-more', $el -> id) }}"><button type="button" class="btn btn-sm btn-outline-secondary">Купить</button></a>
                                @guest
                                @else
                                @if (Auth::user()->group == 3)
                                <a href="{{ route ('products-edit', $el -> id) }}"><button class="btn btn-sm btn-outline-secondary">Редактировать</button></a>
                                <a href="{{ route ('products-delete', $el -> id) }}"><button class="btn btn-sm btn-outline-secondary">Удалить</button></a>
                                @endif
                                @endguest
                            </div>
                            <small class="text-muted">{{$el -> price}}р</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.product_sorting_btn').click(function() {
            let orderBy = $(this).data('order')
            // $('.sorting_text').text($(this).find('span').text())
            $.ajax({
                url: "{{route('home')}}",
                type: "GET",
                data: {
                    orderBy: orderBy,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    let positionParameters = location.pathname.indexOf('?');
                    let url = location.pathname.substring(positionParameters, location.pathname.length);
                    let newURL = url + '?'; // http://127.0.0.1:8001/phones?
                    newURL += 'orderBy=' + orderBy; // http://127.0.0.1:8001/phones?orderBy=name-z-a
                    history.pushState({}, '', newURL);

                    $('.sorting').html(data)
                }
            });
        })
    })
</script>
@endsection