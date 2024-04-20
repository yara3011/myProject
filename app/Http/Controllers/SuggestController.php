<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Requests\SuggestRequest;
use App\Http\Resources\SuggestResource;
use App\Models\suggestion;
class SuggestController extends Controller
{
    public function store(SuggestRequest $request){
        //TODO: recheck this
        $request->validated();
        $suggestion = Suggestion::create([
            'product_condition' => $request->input('product_condition'),    
            'product_name_ar' => $request->input('product_name_ar'),
            'product_name_en' => $request->input('product_name_en'),
            'manufacturer_company' => $request->input('manufacturer_company'),
            'phone_num' => $request->input('phone_num'),
            'status' => $request->input('status'),
        ]);
        return new SuggestResource($suggestion);
    }
}
