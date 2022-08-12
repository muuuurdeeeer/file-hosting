@extends('layouts/edit')

@section('title','Редактирование поста')

@section('content')

    @if(\Illuminate\Support\Facades\Auth::check()) <!-- проверка на авторизацию -->
    <form class="col-6 offset-3 mt-3" method="POST" action="{{ route('post.update', $post) }}">
        <h4>Редактирование поста</h4>
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title" class="form-label">Тема поста</label>
            <input name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="Напишите что-нибудь...">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="body" class="form-label">Содержание</label>
            <textarea name="body" id="body" class="form-control" rows="3">{{ old('body') }}</textarea>
            @error('body')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-warning" value="5" name="sendMe">Отредактировать</button>
        </div>
        <a class="link-secondary text-decoration-none" href="{{ url('/posts') }}">Отмена</a>
    </form>
    @endif

@endsection
