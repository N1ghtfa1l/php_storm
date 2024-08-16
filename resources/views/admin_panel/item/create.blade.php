<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form style="display: flex; flex-direction: column; align-items: start; gap: 10px" action="{{ route('admin.item.store') }}" method="POST">
    @csrf
    <label>Название</label>
    <input type="text" placeholder="Введите название" name="name">
    @error('name')
    <div style="color: red">Введите название!</div>
    @enderror

    <label>Описание</label>
    <input type="text" placeholder="Введите описание товара" name="preview_text">
    @error('preview_text')
    <div style="color: red">Введите описание!</div>
    @enderror

    <label>Цена</label>
    <input type="number" placeholder="Введите цену" name="price">
    @error('price')
    <div style="color: red">Введите цену!</div>
    @enderror

    <label>Категории</label>
    <select name="categories[]" multiple>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <input type="submit" value="Добавить">
</form>
</body>
</html>
