<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: 'Arial';
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .column {
            width: 45%;
        }

        .header {
            text-decoration: none;
            background: black;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px;
            margin-bottom: 20px;
            display: inline-block;
        }

        .item {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;

        }

        .button {
            text-decoration: none;
            cursor: pointer;
            background: black;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 15px;
            margin: 0 5px;
        }

        .button-delete {
            background: red;
            color: white;
        }

        .category-actions, .item-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .item-info {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0 10px;
            flex-wrap: wrap;
        }

        .item-inner {
            display: flex;
            justify-content: space-between;
        }

        li {
            list-style: none;
        }

        ul {
            margin: 0;
            padding: 0;
        }


    </style>
</head>
<body>
<a href="{{route('admin.category.index')}}" class="button">Админ панель</a>
<a href="{{ route('main.index') }}" class="button">Показать все</a>
<div class="container">

    <div class="column">
        @foreach($categories as $category)
            <div class="category item">
                <div class="category-actions">
                    <a href="{{ route('main.index', ['category_id' => $category->id]) }}"
                       class="category-item {{ $categoryId == $category->id ? 'active' : '' }}">
                        <div>{{$category->name}}</div>
                        <div>
                            <a href="{{route('admin.category.edit', $category->id)}}" class="button">Изменить</a>
                            <form action="{{route('admin.category.delete', $category->id)}}" method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="button button-delete" type="submit">Удалить</button>
                            </form>
                        </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="column">
        @foreach($items as $item)
            <div class="item item-inner">
                <div class="item-info">
                    <div>{{$item->name}}</div>
                    <div>{{$item->preview_text}}</div>
                    <div>{{$item->price}}</div>
                    <ul>
                        @foreach($item->categories as $cat_item)
                            <li>{{$cat_item->name}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="item-actions">
                    <a href="{{route('admin.item.edit', $item->id)}}" class="button">Изменить</a>
                    <form action="{{route('admin.item.delete', $item->id)}}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="button button-delete" type="submit">Удалить</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
