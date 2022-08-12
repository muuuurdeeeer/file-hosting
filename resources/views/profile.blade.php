@extends('layouts/app')

@section('title','Профиль')

@section('content')

    <main>
        <div class="container py-4">
            <div class="container marketing">
                <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
                    @can('view-admin-panel')
                        <p><a class="btn btn-warning btn-lg"  href="{{ 'admin-panel' }}" role="button">Панель администратора &raquo;</a></p>
                    @endcan
                    <div class="col-lg-4">
                        <h2>профиль</h2>
                        <img class="rounded-circle" src=" {{ asset($user->profile_photo) }} " alt="Generic placeholder image" width="140" height="140">

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Изменить фото профиля</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>

                    </div>
                    <br>
                    <p><a class="btn btn-secondary btn-lg"  href="{{ 'logout' }}" role="button">Выйти &raquo;</a></p>
                </div>
            </div>
            <div class="container">
                <p style="font-size: 35px">Мои файлы</p>
            </div>
        </div>
    </main>

@endsection
