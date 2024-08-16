<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Items;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Items $item)
    {
        $categories = Categories::all();
        return view('admin_panel/item/edit', compact('item', 'categories'));
    }
}
