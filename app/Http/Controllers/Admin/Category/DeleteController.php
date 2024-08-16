<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Categories;

class DeleteController extends Controller
{
    public function __invoke(Categories $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
