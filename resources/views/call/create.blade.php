@extends('layout.app')

@section('title', 'Создание вызова')

@section('content')
    <h1 class="text-center my-5">Создание вызова</h1>
    <form class="row g-3" method="POST" action="{{ route('call.store') }}">
        @csrf
        <div class="col-12">
            @include('layout.part.error')
        </div>
        <div class="col-md-6">
            <label for="userOutgoing" class="form-label">Исходящий вызов</label>
            <select id="userOutgoing" class="form-select" name="outgoing_id">
                <option disabled selected>Выберите...</option>
                @foreach ($users as $key => $user)
                    <option value="{{ old('outgoing_id') ?? ($user->id ?? '') }}"
                        @if ($key + 1 == old('outgoing_id')) selected @endif>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-6">
            <label for="userIncoming" class="form-label">Входящий вызов</label>
            <select id="userIncoming" class="form-select" name="incoming_id">
                <option disabled selected>Выберите...</option>
                @foreach ($users as $key => $user)
                    <option value="{{ old('incoming_id') ?? ($user->id ?? '') }}"
                        @if ($key + 1 == old('incoming_id')) selected @endif>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-6">
            <label for="startedAt" class="form-label">Начало вызова</label>
            <input type="text" class="form-control" id="startedAt" name="started_at"
                placeholder="Например: 2022-11-09 00:00:00" value="{{ old('started_at') }}">
        </div>
        <div class="col-6">
            <label for="finishedAt" class="form-label">Конец вызова</label>
            <input type="text" class="form-control" id="finishedAt" name="finished_at"
                placeholder="Например: 2022-11-09 00:05:00" value="{{ old('finished_at') }}">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </form>
@endsection
