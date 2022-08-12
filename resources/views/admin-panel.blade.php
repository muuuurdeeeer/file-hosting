@extends('layouts/app')

@section('title','Административная панель')

@section('content')

    <!-- Форма добавления нового пользователя -->
    <form class="col-4 offset-4" method="POST" action="{{ route('admin.create') }}">
        @csrf
        <h4>Добавление пользователя</h4>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Имя</span>
            <input name="name" type="name" id="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
            <input name="email" type="email" id="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Пароль</span>
            <input name="password" type="password" id="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="role" value="{{ 'админ' }}" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Администратор
            </label>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success" value="3" name="sendMe">Добавить</button>
        </div>
        <br>
    </form>

    <!-- Вывод карточек с пользователями -->
    @foreach($users as $user)
        <div class="card border-dark col-4 offset-4 text-dark bg-light mb-3" >
            <div class="card-header">
                @if(\Illuminate\Support\Facades\Cache::has('is_online' . $user->id))
                    <span class="text-success">Online</span>
                @else
                    <span class="text-secondary">Offline</span>
                @endif
                <br>
                Роль: {{ $user->role }}
            </div>
            <div class="card-body">
                <h5 class="card-text"> Имя пользователя: {{ $user->name }} </h5>
                <h5 class="card-title"> Email: {{ $user->email }} </h5>
                <p class="card-text"> Дата регистрации:  {{ $user->created_at }} </p>
                <p>Время последней активности: {{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</p>
            </div>
            <div class="card-footer bg-transparent">
                <a class="link-secondary text-decoration-none" href="{{ url('/edit_user', $user) }}">Изменить данные</a>
                <form method="POST" class="delete_form" action="{{ url('/delete_user',$user['id']) }}">
                    {{ method_field('DELETE') }}
                    {{  csrf_field() }}
                    <button type="submit" class="btn btn-danger">{{ trans('Удалить пользователя') }}</button>
                </form>
            </div>
        </div>
    @endforeach

    <!-- Вывод удаленных пользователей-->
    @foreach($deletedUsers as $user)
        <div class="card text-white bg-secondary col-4 offset-4 mb-3" >
            <div class="card-header">
                Роль: {{ $user->role }}
            </div>
            <div class="card-body">
                <h5 class="card-text"> Имя пользователя: {{ $user->name }} </h5>
                <h5 class="card-title"> Email: {{ $user->email }} </h5>
                <p class="card-text"> Дата удаления::  {{ $user->deleted_at }} </p>
            </div>
            <div class="card-footer bg-transparent text-dark">
                <form method="GET" action="{{ url('/recovery_user', $user->id) }}">
                    <button type="submit" class="btn btn-light">{{ trans('Восстановить пользователя') }}</button>
                </form>
            </div>
        </div>
    @endforeach

@endsection
