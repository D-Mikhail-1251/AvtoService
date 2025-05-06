@extends('layouts.index')
@section('main')
@foreach($orders as $order)
    <div class="container">
    <table>
        <td>
            {{$order}}
        </td>
    </table>
    </div>
@endforeach
@endsection
