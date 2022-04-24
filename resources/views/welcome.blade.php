@extends('layouts.app')

@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('img\Coffee-1.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Текст первого слайда</h5>
                <p>Текст первого слайда</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img\Coffee-2.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Текст второго слайда</h5>
                <p>Текст первого слайда</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img\Coffee-3.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Текст третьего слайда</h5>
                <p>Текст первого слайда</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Предыдущий</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Следующий</span>
    </button>
</div>
<hr class="featurette-divider">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="center">
                <div class="shadow1">
                    <h3> <b> Часы работы </b><br><br></h3>
                    9:00 - 21:00<br>
                    Каждый день
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="center">
                <div class="shadow1">
                    <h3> <b> Адрес </b><br><br></h3>
                    г. Анапа <br>
                    ул. Красноармейская, 1п
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="center">
                <h3> <b> Контакты </b><br><br></h3>
                @mail.ru<br>
                +7 918 174-52-59
            </div>
        </div>
    </div>
</div>
<hr class="featurette-divider">
<div class="container">
    <div class="row featurette">
        <div class="col-md-7">
            <div class="center1">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
                <p class="lead">Lorem Ipsum is simply dummy information that exists for all but the first time and will never expire.</p>
            </div>
        </div>
        <div class="col-md-5">
            <img width="500px" src="{{ asset('img\Coffee-4.jpg') }}" class="d-block w-100" alt="...">
        </div>
    </div>
</div>
<hr class="featurette-divider">
<div class="container">
    <div class="row featurette">
        <div class="col-md-5">
            <img width="500px" src="{{ asset('img\Coffee-4.jpg') }}" class="d-block w-100" alt="...">
        </div>
        <div class="col-md-7">
            <div class="center1">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
                <p class="lead">Lorem Ipsum is simply dummy information that exists for all but the first time and will never expire.
                </p>
            </div>
        </div>
    </div>
</div>
<hr class="featurette-divider">
<div class="container">
    <div class="row featurette">
        <div class="col-md-7">
            <div class="center1">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
                <p class="lead">Lorem Ipsum is simply dummy information that exists for all but the first time and will never expire.</p>
            </div>
        </div>
        <div class="col-md-5">
            <img width="500px" src="{{ asset('img\Coffee-4.jpg') }}" class="d-block w-100" alt="...">
        </div>
    </div>
</div>
<hr class="featurette-divider">
<div class="container mb-2">
    <div class="row featurette">
        <div class="col-md-5">
            <img width="500px" src="{{ asset('img\Coffee-4.jpg') }}" class="d-block w-100" alt="...">
        </div>
        <div class="col-md-7">
            <div class="center">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
                <p class="lead">Lorem Ipsum is simply dummy information that exists for all but the first time and will never expire.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection