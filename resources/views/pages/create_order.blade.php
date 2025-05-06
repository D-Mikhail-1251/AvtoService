@extends('layouts.index')


@section('main')
    <div>
        <form class="d-flex flex-column align-items-center gap-4" action="{{route('create.post')}}" method="post">
            <h1 style="color: #FFFFFF;" class="pt-5">Создание заявки</h1>
            @csrf
            <input style="width: 60%; padding: 15px" class="form-control" type="text" name="full_name" id="full_name" placeholder="ФИО" required>
            <input style="width: 60%; padding: 15px" class="form-control" type="text" name="mark" id="" placeholder="Марка машины" required>
            <input style="width: 60%; padding: 15px" class="form-control" type="text" name="model" placeholder="Модель" required>
            <input style="width: 60%; padding: 15px" class="form-control" type="text" name="state_number" id="" placeholder="Госномер" required>
            <input style="width: 60%; padding: 15px" class="form-control" type="text" name="region" id="" placeholder="Номер региона" required>
            <input style="width: 60%; padding: 15px" class="form-control" type="text" name="phone_number" id="" placeholder="Номер телефона" required>
            <input style="width: 60%; padding: 15px" class="form-control" type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
            <button class="btn btn-success" type="submit">Отправить</button>
        </form>
    </div>
@endsection
