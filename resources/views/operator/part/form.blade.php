@csrf
<div class="col-12">
    <label for="name" class="form-label">Название оператора</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Введите название"
        value="{{ old('name') ?? ($operator->name ?? '') }}">
</div>
<div class="col-6">
    <label for="priceWithin" class="form-label">Цена вызова внутри сети оператора (коп. в минуту)</label>
    <input type="number" class="form-control" id="priceWithin" name="price_within" placeholder="Введите цену"
        value="{{ old('price_within') ?? ($operator->price_within ?? '') }}">
</div>
<div class="col-6">
    <label for="priceAnother" class="form-label">Цена вызова на другие операторы (коп. в минуту)</label>
    <input type="number" class="form-control" id="priceAnother" name="price_another" placeholder="Введите цену"
        value="{{ old('price_another') ?? ($operator->price_another ?? '') }}">
</div>
<div class="col-12">
    <button type="submit" class="btn btn-success">
        @if (!empty($operator->id))
            Изменить
        @else
            Добавить
        @endif
    </button>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
