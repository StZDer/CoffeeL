Поступил новый заказ №{{$cart->id}} от {{\Carbon\Carbon::parse($cart->created_at)->format('H:i d.m.Y')}}

@if ($pickup == 1)
<h1> Доставка</h1>
@else
<h1>Самовывоз</h1>
@endif
<table class="table table-striped">
    <thead>
        <tr>
            <th>Название</th>
            <th>Количество</th>
            <th>Цена</th>
            <th>Цена итого</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($carts as $el)
        <tr>
            <td>{{$el->name}}</td>
            <td>{{$el->quantity}} шт</td>
            <td>{{$el->price}} р</td>
            <td>{{$el->price*$el->quantity}} р</td>
        </tr>
        @endforeach
    </tbody>
</table>
<h4>Итоговая сумма: {{ $sum}}</h4>
<h4>Номер телефона: {{$cart->phone}}</h4>