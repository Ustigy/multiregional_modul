<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="text-muted">
<div class="wrapper">
    <header>
        <div class="bg-light me-3 text-muted fw-bold fs-5 ms-3">
            Выбранный город: {{ session('selected_city.name', 'Не выбран') }}
        </div>
        
        @if(session('selected_city'))
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-20">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index') }}">Главная</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ $cityUrl('about') }}">О нас</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ $cityUrl('news') }}">Новости</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        @endif

    </header>

    <main class="content">
        @yield('content')
    </main>


    <footer class="footer bg-light text-center">
        <p class="mb-0">Multiregional Modul</p>
    </footer>
    
</div>

</body>
</html>
