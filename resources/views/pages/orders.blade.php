@extends('layouts.index')

@section('main')
    <h1 style="color: #FFFFFF; text-align: center; padding: 20px 0">Заказы</h1>
    <table class="flat-table flat-table-1">
        <thead style="background: #ff0000">
        <th>ФИО клиента</th>
        <th>Мастер</th>
        <th>Машина</th>
        <th>Модель</th>
        <th>Гос.номер</th>
        <th>Цена</th>
        <th>Услуга</th>
        <th>Статус</th>
        <th>Примерная дата окончания</th>
        <th>Действие</th>
        </thead>
        <tbody style="background: linear-gradient(135deg, #fff, #ff7f50, #e34f4f, #d32f2f);">
        @foreach($orders as $order)
            <form action="{{ route('order.edit', $order->id) }}" method="get">
                @csrf
                <tr>
                    <td>
                        <input type="text" name="full_name_client"
                               value="{{ $order->full_name_client }}"
                               class="form-control" readonly>
                    </td>
                    <td>
                        <input type="text" name="master_name"
                               value="{{ $order->master_name ?? 'Не назначен' }}"
                               class="form-control" readonly>
                    </td>
                    <td>
                        <input type="text" name="mark" value="{{ $order->mark }}" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="model" value="{{ $order->model }}" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="state_number" value="{{ $order->state_number . ' ' . $order->region }}" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="price" value="{{ $order->price ?? 'Не установлена' }}" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="description" value="{{ $order->description ?? 'Не установлено' }}" class="form-control">
                    </td>
                    <td>
                        <select name="status" id="status" class="form-control">
                            <option value="Формируется" {{ $order->status == 'Формируется' ? 'selected' : '' }}>Формируется</option>
                            <option value="Начат" {{ $order->status == 'Начат' ? 'selected' : '' }}>Начат</option>
                            <option value="В работе" {{ $order->status == 'В работе' ? 'selected' : '' }}>В работе</option>
                            <option value="Выполнен" {{ $order->status == 'Выполнен' ? 'selected' : '' }}>Выполнен</option>
                            <option value="Отменен" {{ $order->status == 'Отменен' ? 'selected' : '' }}>Отменен</option>
                        </select>
                    </td>
                    <td>
                        <input type="date" name="end_time" value="{{ \Carbon\Carbon::parse($order->EndTime)->format('Y-m-d') }}"
                               class="form-control @error('end_time') is-invalid @enderror" readonly>
                        @error('end_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                    <td>
                        <a href="{{ route('order.edit', $order->id) }}" class="btn btn-info">Редактировать</a>
                    </td>
                </tr>
            </form>
        @endforeach
        </tbody>
    </table>
@endsection
