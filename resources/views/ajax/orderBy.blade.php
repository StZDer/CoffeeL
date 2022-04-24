<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach($products as $el)
    @if ($el->in_stock == 1)
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
                        <button type="button" class="btn btn-sm btn-outline-secondary">Купить</button>
                        <a href="{{ route ('products-more', $el -> id) }}"><button type="button" class="btn btn-sm btn-outline-secondary">Подробнее</button></a>
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
    @endif
    @endforeach
</div>