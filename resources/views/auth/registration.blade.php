@extends('layouts.app')

@section('title','Регистрация')

@section('content')

<form class="col-2 offset-5" method="POST" action="{{ route('user.registration') }}">
    <h2>Регистрация</h2>
    @csrf
    <div class="form-group">
        <label for="name" class="col-form-label-lg">Ваше имя</label>
        <input name="name" type="name" class="form-control" id="name" placeholder="Имя">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="email" class="col-form-label-lg">Ваш email</label>
        <input name="email" type="email" class="form-control" id="email" placeholder="Email">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password" class="col-form-label-lg">Пароль</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Пароль">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-primary" value="1" name="sendMe">Зарегистрироваться</button>
    </div>
</form>

@endsection
