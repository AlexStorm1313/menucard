<?php

namespace Alexstorm13\Menu\Http\Controllers;

use Alexstorm13\Menu\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function get()
    {
        $dishes = Dish::all();
        return response()->json($dishes);
    }

    public function getWithRelations()
    {
        $dishes = Dish::with(['categories', 'types'])->get();
        return response()->json($dishes);
    }

    public function getById($id)
    {
        $dish = Dish::findOrFail($id);
        return response()->json($dish);
    }

    public function getByIdWithRelations($id)
    {
        $dish = Dish::with(['categories', 'types'])->findOrFail($id);
        return response()->json($dish);
    }

    public function create(Request $request)
    {
        $validator = Dish::validate($request->dish);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            $dish = Dish::create($request->dish);
            return response()->json($dish);
        }
    }

    public function updateById($id, Request $request)
    {
        $validator = Dish::validate($request->dish);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            $dish = Dish::findOrFail($id);
            $dish->update($request->dish);
            return response()->json($dish);
        }
    }

    public function deleteById($id)
    {
        $dish = Dish::destroy($id);
        return response()->json($dish);
    }

    public function attachType($id, Request $request){
        $dish = Dish::findOrFail($id);
        $dish->attachType($request->types);
        $dish = Dish::with('types')->findOrFail($id);
        return response()->json($dish);
    }

    public function detachType($id, Request $request){
        $dish = Dish::findOrFail($id);
        $dish->detachType($request->types);
        $dish = Dish::with('types')->findOrFail($id);
        return response()->json($dish);
    }

    public function syncType($id, Request $request){
        $dish = Dish::findOrFail($id);
        $dish->syncType($request->types);
        $dish = Dish::with('types')->findOrFail($id);
        return response()->json($dish);
    }

    public function attachCategory($id, Request $request){
        $dish = Dish::findOrFail($id);
        $dish->attachCategory($request->categories);
        $dish = Dish::with('categories')->findOrFail($id);
        return response()->json($dish);
    }

    public function detachCategory($id, Request $request){
        $dish = Dish::findOrFail($id);
        $dish->detachCategory($request->categories);
        $dish = Dish::with('categories')->with('types')->findOrFail($id);
        return response()->json($dish);
    }

    public function syncCategory($id, Request $request){
        $dish = Dish::findOrFail($id);
        $dish->syncCategory($request->categories);
        $dish = Dish::with('categories')->with('types')->findOrFail($id);
        return response()->json($dish);
    }

}
