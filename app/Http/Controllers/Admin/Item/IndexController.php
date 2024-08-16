<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Items;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $items = Items::all();
        return view('admin_panel/item/intro', compact('items'));
    }
}
