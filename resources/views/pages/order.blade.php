@extends('layouts.index')

@section('main')
    <div class="container">
        <h2>Данные заказа #{{ $order->id }}</h2>

        <table class="table table-bordered custom-table-bg">
            <tbody>
            <tr>
                <td>Мастер</td>
                <td>
                    <input type="text" value="{{ $order->master ??  'Не назначен' }}" class="form-control" readonly>
                </td>
            </tr>
            <tr>
                <td>ФИО клиента</td>
                <td>
                    <input type="text" value="{{ $order->full_name_client }}" class="form-control" readonly>
                </td>
            </tr>
            <tr>
                <td>Марка</td>
                <td>
                    <input type="text" value="{{ $order->mark }}" class="form-control" readonly>
                </td>
            </tr>
            <tr>
                <td>Модель</td>
                <td>
                    <input type="text" value="{{ $order->model }}" class="form-control" readonly>
                </td>
            </tr>
            <tr>
                <td>Гос. номер</td>
                <td>
                    <input type="text" value="{{ $order->state_number . ' ' . $order->region }}" class="form-control" readonly>
                </td>
            </tr>
            <tr>
                <td>Цена</td>
                <td>
                    <input type="text" value="{{ $order->price ?? 'Не установлена' }}" class="form-control" readonly>
                </td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>
                    <textarea class="form-control" readonly>{{ $order->description ?? 'Не установлено' }}</textarea>
                </td>
            </tr>
            <tr>
                <td>Статус</td>
                <td>
                    <input type="text" value="{{ $order->status }}" class="form-control" readonly>
                </td>
            </tr>
            <tr>
                <td>Дата завершения</td>
                <td>
                    <input type="text" value="{{ $order->EndTime ? \Carbon\Carbon::parse($order->EndTime)->format('d.m.Y') : 'Не установлена' }}" class="form-control" readonly>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
