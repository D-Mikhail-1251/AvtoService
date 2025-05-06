@extends('layouts.index')

@section('main')
    <h1 style="color: #FFFFFF; text-align: center; padding: 20px 0">Мои задачи</h1>
    <h1 style="color: #FFFFFF; text-align: center; padding: 20px 0">Всего заказов:{{$master->count_of_orders}}</h1>
    <h1 style="color: #FFFFFF; text-align: center; padding: 20px 0">Активных заказов:{{$master->active_orders}}</h1>
    <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; padding: 0 20px;">
        @foreach($orders as $order)
            <div style="background: #e44f12; color: #fff; padding: 20px; border-radius: 10px; width: 300px; box-shadow: 0 0 10px rgba(234,2,2,0.5);">
                <h3 style="margin-bottom: 10px;">{{ $order->full_name_client }}</h3>
                <p><strong>Авто:</strong> {{ $order->mark }} {{ $order->model }}</p>
                <p><strong>Гос.номер:</strong> {{ $order->state_number }} {{ $order->region }}</p>
                <p><strong>Цена:</strong> {{ $order->price ?? 'Не указана' }} ₽</p>
                <p><strong>Услуга:</strong> {{ $order->description ?? 'Нет описания' }}</p>
                <p><strong>Статус:</strong> {{ $order->status }}</p>
                <p><strong>Срок:</strong> {{ \Carbon\Carbon::parse($order->EndTime)->format('d.m.Y') }}</p>
                <a href="{{ route('order.edit', $order->id) }}" class="btn btn-sm btn-primary" style="margin-top: 10px;">Открыть</a>
            </div>
        @endforeach
@endsection
