@extends('layout.app')

@section('title', 'Результат')

@section('content')
    @if (!empty($user))
        <h2 class="text-center my-4">Длительность вызовов пользователя</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Общая длительность</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $time }}</td>
                </tr>
            </tbody>
        </table>
    @elseif (!empty($operator))
        <h2 class="text-center my-4">Длительность вызовов оператора</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Общая длительность</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $operator->id }}</th>
                    <td>{{ $operator->name }}</td>
                    <td>{{ $time }}</td>
                </tr>
            </tbody>
        </table>
    @elseif (!empty($cost_user))
        <h2 class="text-center my-4">Расходы пользователя</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Период</th>
                    <th scope="col">Общие расходы</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $cost_user->id }}</th>
                    <td>{{ $cost_user->name }}</td>
                    <td>{{ $range }}</td>
                    <td>{{ $cost }}</td>
                </tr>
            </tbody>
        </table>
    @endif
@endsection
