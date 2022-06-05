<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('site/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @session('header')
    <header>
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="#">VXSchedule</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('contacts.index')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contacts.create')}}">Contato</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contacts.about')}}">Sobre</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="container mt-5">
        @yield('content')
    </div>

    <script src={{asset('site/jquery.js')}}></script>
    <script src={{asset('site/bootstrap.js')}}></script>
    <script src="../../js/cep"></script>
</body>
</html>
