<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    /**
     * Display a listing of the boycotts.
     *
     * @return \Illuminate\Http\JsonResponse
     */

     public function index(Request $request)
     {
        
         $searchByName = $request->input('name');
         $filterByCategory = $request->input('category');
        //  $filterBySubCategory = $request->input('parent_category');
         $sortBy = $request->input('sort_by'); 
         $sortDirection = $request->input('sort_direction', 'asc'); //as defult putting 'asc', 'desc'
         
         $products = Product::query()->with('category');
        
         
         if ($searchByName) {
             $products->where('name_ar', 'like', '%'.$searchByName.'%')  
                      ->orWhere('name_en', 'like', '%' . $searchByName . '%');
         } 
         
         if ($filterByCategory) 
         { 
            $products->whereHas('category', function ($query) use ($filterByCategory) {
            $query->where('category', $filterByCategory);
        })
        ->orWhereHas('category.parent', function($query) use ($filterBySubCategory){
            $query->where('category', $filterBySubCategory);
        });
            }
     
           /* if ($filterBySubCategory) {
                $products->whereHas('category.parent', function($query) use ($filterBySubCategory){
                    $query->where('category', $filterBySubCategory);
                });
            }*/
     
         if ($sortBy) {
             $products->orderBy($sortBy, $sortDirection);
            //  dd($products->toSql());
         }

        // $products->get();
        $perPage = $request->input('per_page', 9);
        $products =$products->paginate($perPage);

        return ProductResource::collection($products);
     }
    
    /*public function store(BoycottRequest $request)
    {
        $boycott = Boycott::create();

        return response()->json($boycott, 200);
    }*/

    
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

   /* public function searchByName(Request $request)
    {
        $query = $request->input('query');//$_GET['query]
        $results = Boycott::where('productE', 'like', '%$query%')->get();
        return response()->json(['products' => $results]);
    } 
    */

    
}

