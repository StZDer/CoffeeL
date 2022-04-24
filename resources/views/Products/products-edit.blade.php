@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            <h4 class="mb-3">Редактирование продукта</h4>
            <form method="post" action="{{ route('products-edit', $data -> id) }}" class="needs-validation" novalidate="">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="title" class="form-label">Название продукта</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Введите название продукта" value="{{ $data -> title }}">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="price" class="form-label">Цена продукта</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Введите цену продукта" value="{{ $data -> price }}">
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Сообщение</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Введите описание продукта">{{ $data -> description }}</textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <select class="form-select" aria-label="Default select example" name="in_stock" id=in_stock>
                            <option @if ( $data -> in_stock == 1) selected @endif value="1">В наличии</option>
                            <option @if ( $data -> in_stock == 2) selected @endif value="2">Нет в наличии</option>
                        </select>
                        @error('in_stock')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <select class="form-select" aria-label="Default select example" name="category_id" id=category_id>
                            <option @if ( $data -> category_id == 1) selected @endif value="1">Кофе</option>
                            <option @if ( $data -> category_id == 2) selected @endif value="2">Холодные напитки</option>
                            <option @if ( $data -> category_id == 3) selected @endif value="3">Горячие напитки</option>
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-3">
                        <label for="composition1" class="form-label">Состав</label>
                        <input type="text" class="form-control" id="composition1" name="composition1" placeholder="Введите название продукта" value="{{ $data -> composition1}}">
                        @error('composition1')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-3">
                        <label for="composition2" class="form-label"></label>
                        <input type="text" class="form-control" id="composition2" name="composition2" placeholder="Введите название продукта" value="{{ $data -> composition2}}">
                        @error('composition2')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-3">
                        <label for="composition3" class="form-label"></label>
                        <input type="text" class="form-control" id="composition3" name="composition3" placeholder="Введите название продукта" value="{{ $data -> composition3}}">
                        @error('composition3')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-3">
                        <label for="composition4" class="form-label"></label>
                        <input type="text" class="form-control" id="composition4" name="composition4" placeholder="Введите название продукта" value="{{ $data -> composition4}}">
                        @error('composition4')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr class="my-4">
                <button class="w-100 btn btn-primary btn-lg" type="submit">Редактировать продукт</button>
            </form>
        </div>
    </div>
</div>
@endsection