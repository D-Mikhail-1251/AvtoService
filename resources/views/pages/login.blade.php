@extends('layouts.index')
@section('main')
    <div class="login" data-bs-theme="dark">
        @guest()
        <form action="{{route('post.login')}}" method="post">
            @csrf
            <h1>Логин</h1>
            <div class="mb-3" >
                <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember_me">
                <label class="form-check-label" for="exampleCheck1">Запомнить данные при входе</label>
            </div>
            <button type="submit" class="btn btn-primary">Вход</button>
        </form>
    </div>
    @endguest
    @auth()
        <div class="login" data-bs-theme="dark">Вы уже авторизованы</div>
    @endauth
@endsection
