@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-4">
    @include('inc.messages')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header">{{ __('Заказ') }}</div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Название</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Цена итого</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $el)
            <tr>
                <td>{{ $el-> name}}</td>
                <td>{{ $el-> quantity}}</td>
                <td>{{ $el-> price}}</td>
                <td>{{ $el-> quantity*$el-> price}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h4>Итоговая сумма: {{ $sum}}</h4>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <div class="row">
                <div class="col-6">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Доставка
                        </button>
                    </h2>
                </div>
                <div class="col-6">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Самовывоз
                            </button>
                        </h2>
                    </div>
                </div>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <form method="post" action="{{ route('addDelivery') }}" class="needs-validation" novalidate="">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <div class="flex">
                                        <p>Ваш город </p>
                                        <p class="red">*</p>
                                    </div>
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="" required autocomplete="city" autofocus>
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <div class="flex">
                                        <p>Населенный пункт/Улица </p>
                                        <p class="red">*</p>
                                    </div>
                                    <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="" required autocomplete="street" autofocus>
                                    @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <div class="flex">
                                        <p>Дом</p>
                                        <p class="red">*</p>
                                    </div>
                                    <input id="house" type="text" class="form-control @error('house') is-invalid @enderror" name="house" value="" required autocomplete="house" autofocus>
                                    @error('house')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <div class="flex">
                                        <p>Номер телефона</p>
                                        <p class="red">*</p>
                                    </div>
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$user->phone}}" required autocomplete="phone" autofocus>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <div class="flex">
                                        <p>Корпус</p>
                                    </div>
                                    <input id="frame" type="text" class="form-control @error('frame') is-invalid @enderror" name="frame" value="" required autocomplete="frame" autofocus>
                                    @error('frame')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <div class="flex">
                                        <p>Квартира</p>
                                    </div>
                                    <input id="apartment" type="text" class="form-control @error('apartment') is-invalid @enderror" name="apartment" value="" required autocomplete="apartment" autofocus>
                                    @error('apartment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-1">
                                    <div class="flex">
                                        <p>Подъезд</p>
                                    </div>
                                    <input id="entrance" type="text" class="form-control @error('entrance') is-invalid @enderror" name="entrance" value="" required autocomplete="entrance" autofocus>
                                    @error('entrance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-1">
                                    <div class="flex">
                                        <p>Этаж</p>
                                    </div>
                                    <input id="floor" type="text" class="form-control @error('floor') is-invalid @enderror" name="floor" value="" required autocomplete="floor" autofocus>
                                    @error('floor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <div class="flex">
                                        <p>Домофон</p>
                                    </div>
                                    <input id="intercom" type="text" class="form-control @error('intercom') is-invalid @enderror" name="intercom" value="" required autocomplete="intercom" autofocus>
                                    @error('intercom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="flex">
                                        <p>Способ оплаты</p>
                                    </div>
                                    <select class="form-select" aria-label="Default select example" name="pay" id=pay>
                                        <option value="1">Картой при получении</option>
                                        <option value="2">Наличными</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <div class="flex">
                                        <p>Комментарий</p>
                                    </div>
                                    <textarea class="form-control" id="comment" name="comment" placeholder="Введите комментарий"></textarea>
                                    @error('comment')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="center">
                                <button class="w-100 btn btn-primary btn-lg" type="submit">Добавить продукт</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <form method="post" action="{{ route('addPickups') }}" class="needs-validation" novalidate="">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>
                                        Адрес самовывоза: <br>
                                        <small> Набережная, 27, Анапа, Краснодарский край</small>
                                    </h5>
                                </div>
                                <div class="col-md-3">
                                    <div class="flex">
                                        <p>Номер телефона</p>
                                        <p class="red">*</p>
                                    </div>
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$user->phone}}" required autocomplete="phone" autofocus>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="flex">
                                        <p>Комментарий</p>
                                    </div>
                                    <textarea class="form-control" id="comment" name="comment" placeholder="Введите комментарий"></textarea>
                                    @error('comment')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="center mt-4">
                                <button class="w-100 btn btn-primary btn-lg" type="submit">Добавить продукт</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
    function setCursorPosition(pos, e) {
        e.focus();
        if (e.setSelectionRange) e.setSelectionRange(pos, pos);
        else if (e.createTextRange) {
            var range = e.createTextRange();
            range.collapse(true);
            range.moveEnd("character", pos);
            range.moveStart("character", pos);
            range.select()
        }
    }

    function mask(e) {
        //console.log('mask',e);
        var matrix = this.placeholder, // .defaultValue
            i = 0,
            def = matrix.replace(/\D/g, ""),
            val = this.value.replace(/\D/g, "");
        def.length >= val.length && (val = def);
        matrix = matrix.replace(/[_\d]/g, function(a) {
            return val.charAt(i++) || "_"
        });
        this.value = matrix;
        i = matrix.lastIndexOf(val.substr(-1));
        i < matrix.length && matrix != this.placeholder ? i++ : i = matrix.indexOf("_");
        setCursorPosition(i, this)
    }
    window.addEventListener("DOMContentLoaded", function() {
        var input = document.querySelector("#online_phone");
        input.addEventListener("input", mask, false);
        input.focus();
        setCursorPosition(3, input);
    });
</script>
@endsection