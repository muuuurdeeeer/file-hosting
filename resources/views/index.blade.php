@extends('layouts/app')

@section('title','Главная')

@section('content')

<main>
    <div class="container py-4">

            <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
                <div class="col-md-6 px-0">
                    <h1 class="display-5 fw-bold">Файлообменник</h1>
                    <p style="font-size: 20px">Вы можете делиться файлами с друзьями бесплатно! Для этого нужно просто зарегистрироваться на нашем сайте</p>
                    <p><a class="btn btn-primary btn-lg"  href="{{ 'registration' }}" role="button">Регистрация &raquo;</a></p>
                    <p style="font-size: 20px">У вас уже есть аккаунт?</p>
                    <p><a class="btn btn-secondary btn-lg"  href="{{ 'login' }}" role="button">Войти &raquo;</a></p>
                </div>
            </div>

            <div class="album py-5 bg-light">
                <h1 class="display-4 font-italic">Почему пользователи выбирают нас?</h1>
                <div class="container">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="{{ asset('img/site/2.png') }}" alt="Картинка">
                                <div class="card-body">
                                    <h2>Cкорость скачивания</h2>
                                    <p>Моментальная загрузка/выгрузка файлов с нашего сервера</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="{{ asset('img/site/2.png') }}" alt="Card image cap">
                                <div class="card-body">
                                    <h2>Простая регистрация</h2>
                                    <p>Регистрация аккаунта не займет более 5 минут</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="{{ asset('img/site/2.png') }}" alt="Card image cap">
                                <div class="card-body">
                                    <h2>Удобство</h2>
                                    <p>Вы сможете совместно использовать и управлять файлами бесплатно</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <footer class="pt-3 mt-4 text-muted border-top">
            &copy; 2022
        </footer>
    </div>
</main>

@endsection
