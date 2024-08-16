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
<form style="display: flex; flex-direction: column; align-items: start; gap: 10px" action="{{route('admin.category.update', $category->id )}}" method="POST">
    <span>Изменение категории</span>
    @csrf
    @method('PATCH')
    <input type="text" placeholder="Введите название" name="name" value="{{$category->name}}">
    @error('name')
    <div style="color: red">Введите название !</div>
    @enderror
    <input type="submit" value="Обновите">
</form>
</body>
</html>
