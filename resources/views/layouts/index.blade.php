<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{asset('style/app.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap&subset=cyrillic" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md bg-danger border-bottom border-body sticky-custom" data-bs-theme="dark" style="z-index: 1030; position: sticky; top: 0;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">СТО "100"</a>
            <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('masters')}}">Наши мастера</a>
                    </li>
                    @auth()
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('lk')}}">Личный кабинет</a>
                        </li>
                        @if(\Illuminate\Support\Facades\Auth::user()->role == 'админ')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('requests')}}">Админ панель</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.masters')}}">Мастера</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('add.master')}}">Добавить мастера</a>
                            </li>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->role == 'мастер')
                            <li class="nav-item">
                                <a href="{{route('master.tasks')}}" class="nav-link">Мои задачи</a>
                            </li>
                        @endif
                    @endauth
                    @guest()
                        <li class="nav-item">
                            <a class="nav-link  " href="{{ route('register') }}">Регистрация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="{{ route('login') }}">Вход</a>
                        </li>
                    @endguest
                    @if(Auth::check() && (Auth::user()->role == 'админ' || Auth::user()->role == 'мастер'))
                        <li class="nav-item">
                            <a class="nav-link  " href="{{ route('orders.index') }}">Заказы</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>


<main style="min-height: 89vh; background-color: #000000;">
@yield('main')
</main>

<footer class="bg-danger">
    <p>&copy; {{ date('Y') }} СТО "100. All rights reserved.</p>
</footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
