@extends('layouts.index')
@section('main')
    <div class="login" data-bs-theme="dark">
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('register.post')}}" method="post">
            @csrf
            <h1>Регистрация</h1>
            <div class="mb-3" >
                <label for="exampleInputName" class="form-label">Имя</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" name="name">
            </div>
            <div class="mb-3" >
                <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Повторите пароль</label>
                <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1">
            </div>
            <label class="form-check-label" for="exampleCheck1">Запомнить данные при входе</label>
            <input type="checkbox" name="remember_me" id="exampleCheck1" value="1">
            <button type="submit" class="btn btn-primary">Регистрация</button>
        </form>
    </div>
@endsection
