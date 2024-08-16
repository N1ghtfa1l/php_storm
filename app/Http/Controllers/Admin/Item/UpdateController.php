<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Item\UpdateRequest;
use App\Models\Categories;
use App\Models\Items;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Items $item)
    {
        $data = $request->validated();
        $item->update($request->only(['name', 'preview_text', 'price']));

        // Синхронизируем категории
        $item->categories()->sync($request->input('categories', []));

        // Перенаправляем обратно с сообщением об успешном обновлении
        return redirect()->route('main.index');
    }

    public function edit(Items $item)
    {
        // Получаем все категории
        $categories = Categories::all();

        // Передаем данные во вьюху
        return view('admin.item.edit', compact('item', 'categories'));
    }

}
