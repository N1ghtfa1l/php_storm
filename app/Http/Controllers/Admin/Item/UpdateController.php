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
        $item->categories()->sync($request->input('categories', []));
        return redirect()->route('main.index');
    }

    public function edit(Items $item)
    {
        $categories = Categories::all();
        return view('admin.item.edit', compact('item', 'categories'));
    }

}
