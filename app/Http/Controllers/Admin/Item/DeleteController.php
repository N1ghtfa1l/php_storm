<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Categories;
use App\Models\Items;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Items $item)
    {
        $item->delete();
        return redirect()->back();
    }
}
