<?php

namespace Alexstorm13\Menu\Http\Controllers;

use Alexstorm13\Menu\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function get()
    {
        $menus = Menu::all();
        return response()->json($menus);
    }

    public function getWithRelations()
    {
        $menus = Menu::with('categories.dishes.types')->get();
        return response()->json($menus);
    }

    public function getById($id)
    {
        $menu = Menu::findOrFail($id);
        return response()->json($menu);
    }

    public function getByIdWithRelations($id)
    {
        $menu = Menu::with('categories.dishes.types')->findOrFail($id);
        return response()->json($menu);
    }

    public function create(Request $request)
    {
        $validator = Menu::validate($request->menu);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            $menu = Menu::create($request->menu);
            return response()->json($menu);
        }
    }

    public function updateById($id, Request $request)
    {
        $validator = Menu::validate($request->menu);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            $menu = Menu::findOrFail($id);
            $menu->update($request->menu);
            return response()->json($menu);
        }
    }

    public function deleteById($id)
    {
        $menu = Menu::destroy($id);
        return response()->json($menu);
    }

    public function attachCategory($id, Request $request){
        $menu = Menu::findOrFail($id);
        $menu->attachCategory($request->categories);
        $menu = Menu::with('categories')->findOrFail($id);
        return response()->json($menu);
    }

    public function detachCategory($id, Request $request){
        $menu = Menu::findOrFail($id);
        $menu->detachCategory($request->categories);
        $menu = Menu::with('categories')->findOrFail($id);
        return response()->json($menu);
    }

    public function syncCategory($id, Request $request){
        $menu = Menu::findOrFail($id);
        $menu->syncCategory($request->categories);
        $menu = Menu::with('categories')->findOrFail($id);
        return response()->json($menu);
    }
}
