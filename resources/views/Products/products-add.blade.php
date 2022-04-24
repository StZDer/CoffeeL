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
            <h4 class="mb-3">Добавить продукт</h4>
            <form method="post" action="{{ route('products-add') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="title" class="form-label">Название продукта</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Введите название продукта" value="{{ old('title') }}">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="price" class="form-label">Цена продукта</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Введите цену продукта" value="{{ old('price') }}">
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Сообщение</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Введите описание продукта"></textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <select class="form-select" aria-label="Default select example" name="in_stock" id=in_stock>
                            <option value="1">В наличии</option>
                            <option value="2">Нет в наличии</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <select class="form-select" aria-label="Default select example" name="category_id" id=category_id>
                            <option value="1">Кофе</option>
                            <option value="2">Холодные напитки</option>
                            <option value="3">Горячие напитки</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="composition1" class="form-label">Состав</label>
                        <input type="text" class="form-control" id="composition1" name="composition1" placeholder="Введите название продукта" value="{{ old('composition1') }}">
                    </div>
                    <div class="col-sm-3">
                        <label for="composition2" class="form-label"></label>
                        <input type="text" class="form-control" id="composition2" name="composition2" placeholder="Введите название продукта" value="{{ old('composition2') }}">
                    </div>
                    <div class="col-sm-3">
                        <label for="composition3" class="form-label"></label>
                        <input type="text" class="form-control" id="composition3" name="composition3" placeholder="Введите название продукта" value="{{ old('composition3') }}">
                    </div>
                    <div class="col-sm-3">
                        <label for="composition4" class="form-label"></label>
                        <input type="text" class="form-control" id="composition4" name="composition4" placeholder="Введите название продукта" value="{{ old('composition4') }}">
                    </div>
                </div>
                <hr class="my-4">
                <button class="w-100 btn btn-primary btn-lg" type="submit">Добавить продукт</button>
            </form>
        </div>
    </div>
</div>
@endsection