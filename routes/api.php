<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\SuggestController;
use App\Http\Controllers\Requests\RegisterRequest;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserListController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

//Registration and Login
Route::prefix('auth')->group(function () {
    Route::group(['controller' => AuthController::class], function () {
        Route::post('register', 'CreateUser');
        Route::post('login', 'loginUser');
        Route::post('logout', 'destroy')->middleware('auth:sanctum');
    });
});

//user details
  Route::middleware('auth:sanctum')->group(function (){
    Route::group(['controller' => UserController::class], function () {
        Route::get('details', 'show');
        Route::put('update',  'update');
        Route::delete('delete', 'destroy');
    });
});

//Get product
    Route::group(['controller' => ProductController::class], function () {
        Route::get('products', 'index');
        Route::get('/product/{product}', 'show');
});


Route::post('suggestion', [SuggestController::class ,'store']);

//save iteam and unsaved
 Route::middleware('auth:sanctum')->group(function () {
    Route::group(['controller' => UserListController::class], function () {
        Route::post('/product/save/{product}', 'save');
        Route::delete('/product/unsave/{product}', 'unsave');
        });   
});