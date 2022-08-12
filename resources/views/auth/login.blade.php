@extends('layouts.app')

@section('title','Аутентификация')

@section('content')

<form class="col-2 offset-5" method="POST" action="{{ route('user.login') }}">
    <h2>Аутентификация</h2>
    @csrf
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
        <button type="submit" class="btn btn-lg btn-primary" value="2" name="sendMe2">Войти</button>
    </div>
</form>

@endsection
