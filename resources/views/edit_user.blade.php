@extends('layouts/edit')

@section('title','Редактирование пользователя')

@section('content')
    <form class="col-4 offset-4 mt-3" method="POST" action="{{ route('admin.update', $user) }}">
        <h4>Редактирование пользователя</h4>
        @csrf
        @method('PATCH')
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Имя</span>
            <input name="name" type="name" id="name" class="form-control">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
            <input name="email" type="email" id="email" class="form-control">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Пароль</span>
            <input name="password" type="password" id="password" class="form-control">
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
            <button type="submit" class="btn btn-lg btn-warning" value="7" name="sendMe">Применить изменения</button>
        </div>
        <a class="link-secondary text-decoration-none" href="{{ url('/admin-panel') }}">Отмена</a>
    </form>
@endsection
