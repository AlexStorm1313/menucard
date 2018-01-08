<?php

namespace Alexstorm13\Menu\Http\Controllers;

use Alexstorm13\Menu\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function get()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function getWithRelations()
    {
        $categories = Category::with(['dishes.types', 'menus'])->get();
        return response()->json($categories);
    }

    public function getById($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    public function getByIdWithRelations($id)
    {
        $category = Category::with(['dishes.types', 'menus'])->findOrFail($id);
        return response()->json($category);
    }

    public function create(Request $request)
    {
        $validator = Category::validate($request->category);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            $category = Category::create($request->category);
            return response()->json($category);
        }
    }

    public function updateById(Request $request, $id)
    {
        $validator = Category::validate($request->category);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            $category = Category::findOrFail($id);
            $category->update($request->category);
            return response()->json($category);
        }
    }

    public function deleteById($id)
    {
        $category = Category::destroy($id);
        return response()->json($category);
    }

    public function attachDish($id, Request $request)
    {
        $type = Category::findOrFail($id);
        $type->attachDish($request->dishes);
        $type = Category::with('dishes')->findOrFail($id);
        return response()->json($type);
    }

    public function detachDish($id, Request $request)
    {
        $type = Category::findOrFail($id);
        $type->detachDish($request->dishes);
        $type = Category::with('dishes')->findOrFail($id);
        return response()->json($type);
    }

    public function syncDish($id, Request $request)
    {
        $type = Category::findOrFail($id);
        $type->syncDish($request->dishes);
        $type = Category::with('dishes')->findOrFail($id);
        return response()->json($type);
    }

    public function attachMenu($id, Request $request)
    {
        $type = Category::findOrFail($id);
        $type->attachMenu($request->menus);
        $type = Category::with('menus')->findOrFail($id);
        return response()->json($type);
    }

    public function detachhMenu($id, Request $request)
    {
        $type = Category::findOrFail($id);
        $type->detachMenu($request->menus);
        $type = Category::with('menus')->findOrFail($id);
        return response()->json($type);
    }

    public function syncMenu($id, Request $request)
    {
        $type = Category::findOrFail($id);
        $type->syncMenu($request->menus);
        $type = Category::with('menus')->findOrFail($id);
        return response()->json($type);
    }
}
