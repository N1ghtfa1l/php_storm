<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Categories;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Categories::all();
        return view('admin_panel/intro', compact('categories'));
    }
}
