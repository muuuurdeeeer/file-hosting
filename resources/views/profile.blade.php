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

                        <form class="form-control" action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            Выберите файл:
                            <br>
                            <input type="file" name="upload_file">
                            <br><br>
                            <input type="submit" value="Загрузить">
                        </form>
                </div>
            </div>
            <div class="container">
                <p style="font-size: 35px">Мои файлы</p>
            </div>
        </div>

        @foreach($files as $file)
            <div class="card col-6 offset-3 text-dark bg-light mb-3" >
                <div class="card-body">
                    <h5 class="card-title"> {{ $file->name }} </h5>
                    <p class="card-text"> {{ $file->created_at->format('d/m/Y') }} {{ $file->created_at->format('H:i') }}</p>
                </div>
                <form method="post" class="download_file" action="{{ url('/download_file',$file->id) }}">
                    {{  csrf_field() }}
                    <button type="submit" class="btn btn-success">{{ trans('Скачать') }}</button>
                </form>
                <form method="post" class="delete_file" action="{{ url('/delete_file',$file->id) }}">
                    {{ method_field('DELETE') }}
                    {{  csrf_field() }}
                    <button type="submit" class="btn btn-danger">{{ trans('Удалить') }}</button>
                </form>
            </div>
        @endforeach
        {{ $files->links() }}

    </main>

@endsection
