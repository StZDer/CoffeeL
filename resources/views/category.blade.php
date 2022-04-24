@extends('layouts.app')

@section('content')
<section class="home">
    <div class="container">
        <div class="home-content">
            <h1>
                {{$category->title}}
            </h1>
            <div class="desc">{{$category->desc}}</div>
        </div>
        <div class="home-img">
            <img src="/img/{{$category->img}}" alt="">
        </div>
    </div>
</section>
<div class="container mt-5">
    <p>Показано: {{$products->count()}} результатов</p>
    <div class="right">
        <div class="btn-group">
            <button type="button" class=" btn btn-secondary  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Сортировать
            </button>
            <ul class="dropdown-menu">
                <li class="product_sorting_btn" data-order="default"><a class="dropdown-item" href="#">По умолчанию</a></li>
                <li class="product_sorting_btn" data-order="prise-high-low">
                    <a class="dropdown-item" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                            <path d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                        </svg>
                        По цене: От меньшего к большему
                    </a>
                </li>
                <li class="product_sorting_btn" data-order="prise-low-high">
                    <a class="dropdown-item" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-down-alt" viewBox="0 0 16 16">
                            <path d="M3.5 3.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 12.293V3.5zm4 .5a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1zm0 3a.5.5 0 0 1 0-1h3a.5.5 0 0 1 0 1h-3zm0 3a.5.5 0 0 1 0-1h5a.5.5 0 0 1 0 1h-5zM7 12.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5z" />
                        </svg>
                        По цене: От большего к меньшему
                    </a>
                </li>
                <li class="product_sorting_btn" data-order="name-a-z">
                    <a class="dropdown-item" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z" />
                            <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z" />
                        </svg>
                        По имени: От А до Я
                    </a>
                </li>
                <li class="product_sorting_btn" data-order="name-z-a">
                    <a class="dropdown-item" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down-alt" viewBox="0 0 16 16">
                            <path d="M12.96 7H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V7z" />
                            <path fill-rule="evenodd" d="M10.082 12.629 9.664 14H8.598l1.789-5.332h1.234L13.402 14h-1.12l-.419-1.371h-1.781zm1.57-.785L11 9.688h-.047l-.652 2.156h1.351z" />
                            <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z" />
                        </svg>
                        По имени: От Я до А
                    </a>
                </li>
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
                        {{$el -> title}}
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
                url: "{{route('showCategory',$category->alias)}}",
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