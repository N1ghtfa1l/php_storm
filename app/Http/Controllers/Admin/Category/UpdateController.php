<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Categories;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Categories $category)
    {
        $data = $request->validated();
        $category->update($data);
        return view('admin_panel/intro', compact('category'));
    }
}
