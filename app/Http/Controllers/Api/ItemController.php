<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Items;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $query = Items::query();
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
        $items = $query->paginate(10);
        return response()->json([
            'items' => $items->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'preview_text' => $item->preview_text,
                    'price' => $item->price,
                    'category' => $item->categories->pluck('name')->implode(', '),
                ];
            }),
        ]);
    }
    public function show($id)
    {
        $item = Items::findOrFail($id);

        return response()->json([
            'id' => $item->id,
            'name' => $item->name,
            'preview_text' => $item->preview_text,
            'price' => $item->price,
            'category' => $item->categories->pluck('name')->implode(', '),
        ]);
    }
}
