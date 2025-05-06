@extends('layouts.index')

@section('main')
    <div id="carouselExample" data-bs-theme="dark" class="carousel slide bg-white">
        <table class="flat-table flat-table-1">
            <thead>
            <th>Клиент</th>
            <th>Машина</th>
            <th>Модель</th>
            <th>Гос.номер</th>
            <th>Номер региона</th>
            <th>Номер телефона</th>
            <th>Действия</th>
            </thead>
            <tbody>
            @foreach($requests as $request)
                <tr>
                    <form action="{{ route('order.accept') }}" method="post">
                        @csrf
                        <td>
                            <input type="text" name="full_name_client" value="{{ $request->full_name }}" readonly class="form-control-plaintext">
                        </td>
                        <td>
                            <input type="text" name="mark" value="{{ $request->mark }}" readonly class="form-control-plaintext">
                        </td>
                        <td>
                            <input type="text" name="model" value="{{ $request->model }}" readonly class="form-control-plaintext">
                        </td>
                        <td>
                            <input type="text" name="state_number" value="{{ $request->state_number }}" readonly class="form-control-plaintext">
                        </td>
                        <td>
                            <input type="text" name="region" value="{{ $request->region }}" readonly class="form-control-plaintext">
                        </td>
                        <td>
                            <input type="text" name="phone_number_client" value="{{ $request->phone_number }}" readonly class="form-control-plaintext">
                        </td>
                        <td>
                            <input type="hidden" name="user_id" value="{{ $request->user_id }}">
                            <input type="hidden" name="id" value="{{ $request->id }}">

                            <button type="submit" name="action" value="accept" class="btn btn-success">Принять</button>
                            <button type="submit" name="action" value="reject" class="btn btn-danger">Отказать</button>
                        </td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
