<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CoffeeL</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/19098cef19.js" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" aria-label="Ninth navbar example">
            <div class="container-xl">
                <a class="navbar-brand" href="{{route ('welcome')}}">
                    <img src="{{ asset('img\CoffeL(10).jpeg') }}" alt="" width="50px">
                </a>
                <a class="navbar-brand" href="{{route ('welcome')}}">CoffeeL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample07XL">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route ('welcome')}}">Главная</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Категории
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('home') }}">Все</a></li>
                                @foreach($categories as $category)
                                <li><a class="dropdown-item" href="{{ route('showCategory', $category->alias) }}">{{$category->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}" tabindex="-1" aria-disabled="true">О нас</a>
                        </li>
                    </ul>
                    <div class="cart">
                        <img src="/img/basket.png" width="40" height="40" alt="cart" />
                        <a href="{{ route('cart') }}">
                            Корзина (<span class="cart-qty">{{isset($_COOKIE['cart_id']) ? \Cart::session($_COOKIE['cart_id'])->getTotalQuantity() : '0'}}</span>)
                        </a>
                    </div>
                    @guest
                    @if (Route::has('login'))
                    <a class="navbar-brand" href="{{ route('login') }}">{{ __('Войти') }}</a>
                    @endif
                    @if (Route::has('register'))
                    <a class="navbar-brand" href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>
                    @endif
                    @else


                    @if (Auth::user()->group == 3)
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Админка
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('orders') }}">Заказы(доставка)</a></li>
                            <li><a class="dropdown-item" href="{{ route('pickups') }}">Заказы(самовывоз)</a></li>
                            <li><a class="dropdown-item" href="{{ route('products') }}">Добавить продукт</a></li>
                            <li><a class="dropdown-item" href="{{ route('all') }}">Вся продукция с удаленными</a></li>
                            <li><a class="dropdown-item" href="{{ route('users') }}">Пользователи</a></li>
                        </ul>
                    </div>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="navbar-brand dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Выйти') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
            <div class="footers">
                <div class="d-flex justify-content-between py-4 border-top">
                    <p>© 2021 Coffee L</p>
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <div class="center">
                                    Какой то текст
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="center">
                                    Какой то текст
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="center">
                                    Какой то текст
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="social-container">
                        <ul class="social-icons">
                            <li><a target="_blank" href="https://www.instagram.com/stzder/"><i class="fa fa-instagram"></i></a></li>
                            <li><a target="_blank" href="https://vk.com/sasha_vasilchenko"><i class="fa fa-vk"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="/js/jquery-3.2.1.min.js"></script>
    @yield('scripts')
</body>


</html>