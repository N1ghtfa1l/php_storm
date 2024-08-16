<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактирование товара</title>
</head>
<body>
<form style="display: flex; flex-direction: column; align-items: start; gap: 10px"
      action="{{route('admin.item.update', $item->id )}}" method="POST">
    @csrf
    @method('PATCH')
    <span>Изменение названия</span>
    <input type="text" placeholder="Введите название товара" name="name" value="{{$item->name}}">
    @error('name')
    <div style="color: red">Введите название !</div>
    @enderror

    <span>Изменение описания</span>
    <input type="text" placeholder="Введите описание товара" name="preview_text" value="{{$item->preview_text}}">
    @error('preview_text')
    <div style="color: red">Введите описание!</div>
    @enderror

    <span>Изменение цены</span>
    <input type="number" placeholder="Введите цену товара" name="price" value="{{$item->price}}">
    @error('price')
    <div style="color: red">Введите цену!</div>
    @enderror

    <span>Изменение категорий</span>
    <select name="categories[]" multiple>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ in_array($category->id, $item->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <input type="submit" value="Обновить">
</form>
</body>
</html>
