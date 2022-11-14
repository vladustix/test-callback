@extends('layout.app')

@section('title', 'Результат')

@section('content')
    @if (!empty($user))
        <h1 class="text-center my-5">Длительность вызовов пользователя</h1>
        <div class="table-responsive">
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
        </div>
    @elseif (!empty($operator))
        <h1 class="text-center my-5">Длительность вызовов оператора</h1>
        <div class="table-responsive">
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
        </div>
    @elseif (!empty($cost_user))
        <h1 class="text-center my-5">Расходы пользователя</h1>
        <div class="table-responsive">
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
        </div>
    @endif
@endsection
