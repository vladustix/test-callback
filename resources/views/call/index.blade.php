@extends('layout.app')

@section('title', 'Журнал вызовов')

@section('content')
    <h2 class="text-center my-4">Журнал вызовов</h2>
    <a href="{{ route('call.create') }}" class="btn btn-primary mb-4">Создать</a>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Исходящий</th>
                <th scope="col">Входящий</th>
                <th scope="col">Начало</th>
                <th scope="col">Конец</th>
                <th scope="col">Длительность</th>
                <th scope="col">Стоимость</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($calls as $call)
                <tr>
                    <th scope="row">{{ $call->id }}</th>
                    <td>{{ $call->userOutgoing->name }}</td>
                    <td>{{ $call->userIncoming->name }}</td>
                    <td>{{ $call->started_at }}</td>
                    <td>{{ $call->finished_at }}</td>
                    <td>{{ $call->duration }}</td>
                    <td>{{ $call->cost }}</td>
                    <td class="text-center">
                        <form action="{{ route('call.destroy', ['call' => $call->id]) }}" method="post"
                            onsubmit="return confirm('Удалить вызов?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="bi bi-trash-fill text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
