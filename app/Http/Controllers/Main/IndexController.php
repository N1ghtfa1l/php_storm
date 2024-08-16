<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Items;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $categoryId = $request->input('category_id');

        $categories = Categories::all();

        if ($categoryId) {
            $items = Items::whereHas('categories', function ($query) use ($categoryId) {
                $query->where('categories.id', $categoryId);
            })->get();
        } else {
            $items = Items::all();
        }

        return view('main.index', compact('categories', 'items', 'categoryId'));
    }
}
