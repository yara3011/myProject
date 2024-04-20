<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Support\Facades\Validator;



class AuthController extends Controller
{
  
    public function createUser(RegisterRequest $request)
    {
        $dob = Carbon::parse($request->dob);
        $now = Carbon::now();
        $age = $dob->diffInYears($now);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'dob' => $request->dob,
            //'age' => $age,
        ]);

        return new UserResource($user);
        
        /*response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);*/
    }
    

 public function loginUser(LoginRequest $request)
{
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'status' => false,
                'message' => 'Email & Password does not exist',
            ], 401);
        }

        $user = $request->user();

        return response()->json([
            'status' => true,
            'message' => 'User Logged In Successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }

    

    //   $user_name = Auth::user()->name;
    //   $user_email = Auth::user()->emial;
    //   $user_gender = Auth::user()->gender;
    //   $user_dob = Auth::user()->dob;


    public function destroy(Request $request)//logout
    {

    auth()->user()->tokens()->delete();

    return response()->json([
        'status' => true ,
        'message' => 'User Logged Out Successfully',
    ]);
    }
}