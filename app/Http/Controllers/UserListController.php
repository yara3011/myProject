<?php

namespace App\Http\Controllers;

use App\Models\Product; 
use App\Models\User; 
use Illuminate\Http\Request;

class UserListController extends Controller
{

    public function save(Request $request, Product $product){
        $user = auth()->user();
        //TODO: attach / sync/ sync without deatching
        $user->savedProducts()->attach($product->id);
        return response()->json(['message' => 'Blog saved successfully']);
    }
    public function unsave(Request $request, Product $product){
        $user = $request->user();
        $user->savedProducts()->detach($product->id);
        return response()->json(['message' => 'Blog unsaved successfully']);
    }
}
