<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Item\StoreRequest;
use App\Models\Items;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->except('categories');
        $item = Items::create($data);

        // Обработка категорий отдельно
        if ($request->has('categories')) {
            $item->categories()->sync($request->input('categories'));
        }

        return redirect()->route('main.index');
    }
}
