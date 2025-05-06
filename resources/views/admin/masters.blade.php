@extends('layouts.index')

@section('main')
    <h1 style="color: #FFFFFF; text-align: center; padding: 20px 0">Мастера</h1>
    <table class="flat-table flat-table-1">
        <thead>
        <th>Id</th>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Стаж работы</th>
        <th>Дата устройства</th>
        <th>Действия</th>
        </thead>
        <tbody>
        @foreach($masters as $master)
            @php
                $workExperience = \Carbon\Carbon::parse($master->work_experience);
                $now = \Carbon\Carbon::now();
                $diff = $now->diff($workExperience);
            @endphp
            <tr>
                <td>
                    {{ $master->id }}
                </td>
                <td>
                    <input type="text" value="{{ $master->name }}" class="form-control" readonly>
                </td>
                <td>
                    <input type="text" value="{{ $master->last_name }}" class="form-control" readonly>
                </td>
                <td>
                    <input type="text" value="{{ $diff->y }} Лет {{ $diff->m }} Месяца {{ $diff->d }} Дня" class="form-control" readonly>
                </td>
                <td>
                    <input type="text" value="{{ $master->created_at }}" class="form-control" readonly>
                </td>
                <td>
                    <form action="{{ route('delete.master') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $master->user_id }}">
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
