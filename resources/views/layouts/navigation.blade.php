<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ '/' }}">Файлообменник</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if(\Illuminate\Support\Facades\Auth::check())
            <form class="d-flex">
                <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Поиск" />
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Поиск</button>
            </form>
        @endif
    </div>
</nav>

{{--<nav aria-label="breadcrumb">--}}
{{--    <ol class="breadcrumb">--}}
{{--        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--        <li class="breadcrumb-item"><a href="#">Library</a></li>--}}
{{--        <li class="breadcrumb-item active" aria-current="page">Data</li>--}}
{{--    </ol>--}}
{{--</nav>--}}

