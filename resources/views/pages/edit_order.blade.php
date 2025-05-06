@extends('layouts.index')
@section('main')

    <div class="container" data-bs-theme="dark">
        <h2 class="pt-5" style="color: #fff">Редактирование заказа #{{ $order->id }}</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('order.update', $order->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>UUID</td>
                    <td>{{ $order->uuid }}</td>
                </tr>
                <tr>
                    <td>Мастер</td>
                    <td>
                        <select name="master_id" class="form-select @error('master_id') is-invalid @enderror">
                            <option value="">Не назначен</option>
                            @foreach($masters as $master)
                                <option value="{{ $master->id }}" {{ old('master_id', $order->master_id) == $master->id ? 'selected' : '' }}>
                                    {{ $master->name }} {{ $master->last_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('master_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>ФИО клиента</td>
                    <td>
                        <input type="text" name="full_name_client" value="{{ old('full_name_client', $order->full_name_client) }}"
                               class="form-control @error('full_name_client') is-invalid @enderror" required>
                        @error('full_name_client')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Марка</td>
                    <td>
                        <input type="text" name="mark" value="{{ old('mark', $order->mark) }}"
                               class="form-control @error('mark') is-invalid @enderror" required>
                        @error('mark')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Модель</td>
                    <td>
                        <input type="text" name="model" value="{{ old('model', $order->model) }}"
                               class="form-control @error('model') is-invalid @enderror" required>
                        @error('model')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Гос. номер</td>
                    <td>
                        <div class="input-group">
                            <input type="text" name="state_number" value="{{ old('state_number', $order->state_number) }}"
                                   class="form-control @error('state_number') is-invalid @enderror" required>
                            <input type="text" name="region" value="{{ old('region', $order->region) }}"
                                   class="form-control @error('region') is-invalid @enderror" style="width: 60px;" maxlength="3" required>
                        </div>
                        @error('state_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @error('region')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Цена</td>
                    <td>
                        <input type="number" name="price" value="{{ old('price', $order->price) }}"
                               class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Описание</td>
                    <td>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $order->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Статус</td>
                    <td>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                            <option value="Формируется" {{ old('status', $order->status) == 'Формируется' ? 'selected' : '' }}>Формируется</option>
                            <option value="Начат" {{ old('status', $order->status) == 'Начат' ? 'selected' : '' }}>Начат</option>
                            <option value="В работе" {{ old('status', $order->status) == 'В работе' ? 'selected' : '' }}>В работе</option>
                            <option value="Выполнен" {{ old('status', $order->status) == 'Выполнен' ? 'selected' : '' }}>Выполнен</option>
                            <option value="Отменен" {{ old('status', $order->status) == 'Отменен' ? 'selected' : '' }}>Отменен</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Дата завершения</td>
                    <td>
                        <input type="date" name="EndTime" value="{{ \Carbon\Carbon::parse($order->EndTime)->format('Y-m-d') }}"
                               class="form-control @error('end_time') is-invalid @enderror">
                        @error('end_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Изображение</td>
                    <td>
                        <input type="url" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if($order->image)
                            <div class="mt-2">
                                <img src="{{ $order->image }}" width="100" class="img-thumbnail">
                                <div class="form-check mt-2">
                                    <input type="checkbox" name="remove_image" id="remove_image" class="form-check-input">
                                    <label for="remove_image" class="form-check-label">Удалить текущее изображение</label>
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            </div>
        </form>

        <form action="{{ route('order.destroy', $order->id) }}" method="POST" class="mt-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить этот заказ?')">Удалить заказ</button>
        </form>
    </div>

@endsection
