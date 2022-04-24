@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-4">
            <a href="{{ route ('users') }}" class="alert-link">Все пользователи</a>
        </div>
        <div class="col-sm-4">
            <a href="{{ route ('users-bartenders') }}" class="alert-link">Бармены</a>
        </div>
        <div class="col-sm-4">
            <a href="{{ route ('users-clients') }}" class="alert-link">Клиенты</a>
        </div>
    </div>
    <ul class="list1a">
        @foreach($data as $el)
        <li>
            <div class="row">
                <div class="col-sm-2 mt-2 mb-2">Имя: <br>
                    {{$el->name}}
                </div>
                <div class="col-sm-2 mt-2 mb-2">Телефон: <br>
                    {{$el->phone}}
                </div>
                <div class="col-sm-1 mt-2 mb-2">Дата рождения: <br>
                    {{\Carbon\Carbon::parse($el->dob)->format('d/m/Y')}}
                </div>
                <div class="col-sm-1 mt-2 mb-2">Пол: <br>
                    @if ($el->gender == 1)
                    Мужской
                    @else
                    Женский
                    @endif
                </div>
                <div class="col-sm-2 mt-2 mb-2">Email: <br>
                    {{$el->email}}
                </div>
                <div class="col-sm-1 mt-2 mb-2">Права: <br>
                    @if ($el->group == 3)
                    Админ
                    @elseif ($el->group != 2)
                    Клиент
                    @else
                    Бармен
                    @endif
                </div>
                <div class="col-sm-1 mt-2 mb-2">Дата создания: <br>
                    {{\Carbon\Carbon::parse($el->created_at)->format('H:i:s d/m/Y')}}
                </div>
                <div class="col-sm-1 mt-2 mb-2">
                    <a href="{{ route ('user-edit', $el -> id) }}"><button type="button" class="btn btn-primary">Редактировать</button></a>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection