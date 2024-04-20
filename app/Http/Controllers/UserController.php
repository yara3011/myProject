<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class UserController extends Controller
{ 
    public function show(){
    $user = auth()->user();
    return new UserResource($user);
    
    /*response()->json([ $user]);*/
    }

    public function update(UpdateRequest $request){
        $user = Auth::user();  
        //return response()->json(['error' => 'Unauthorized'], 401);//non Unauthorized
        
        /* Update the user's details
        ////////////////////////////**security issue////////////////////////////////////////////////////
        Code Injections - SQL Injections*/

        $user->update($request->all());
        $user->save();
        return  new UserResource($user); 
        /*response()->json($user,200);*/
    }
    
        // $user = $request->auth()->user()->update($user);
    public function destroy(){
            $user = Auth::user();  
            $user->delete();
            return response()->json(['msg' =>"User deleted"],200);
    }
}