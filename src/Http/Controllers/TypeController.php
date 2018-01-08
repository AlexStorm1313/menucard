<?php

namespace Alexstorm13\Menu\Http\Controllers;

use Alexstorm13\Menu\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function get(){
        $types = Type::all();
        return response()->json($types);
    }

    public function getWithRelations(){
        $types = Type::with('dishes')->get();
        return response()->json($types);
    }

    public function getById($id)
    {
        $type = Type::findOrFail($id);
        return response()->json($type);
    }

    public function getByIdWithRelations($id)
    {
        $type = Type::with('dishes')->findOrFail($id);
        return response()->json($type);
    }
    
    public function create(Request $request){
        $validator = Type::validate($request->type);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            $type = Type::create($request->type);
            return response()->json($type);
        }
    }

    public function updateById(Request $request, $id)
    {
        $validator = Type::validate($request->type);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            $type = Type::findOrFail($id);
            $type->update($request->type);
            return response()->json($type);
        }
    }

    public function deleteById($id)
    {
        $type = Type::destroy($id);
        return response()->json($type);
    }

    public function attachDish($id, Request $request){
        $type = Type::findOrFail($id);
        $type->attachDish($request->dishes);
        $type = Dish::with('dishes')->findOrFail($id);
        return response()->json($type);
    }

    public function detachDish($id, Request $request){
        $type = Type::findOrFail($id);
        $type->detachType($request->dishes);
        $type = Type::with('dishes')->findOrFail($id);
        return response()->json($type);
    }

    public function syncDish($id, Request $request){
        $type = Type::findOrFail($id);
        $type->syncDish($request->dishes);
        $type = Type::with('dishes')->findOrFail($id);
        return response()->json($type);
    }
}
