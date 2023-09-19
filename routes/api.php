<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLogoutController;

// 註冊用
Route::post('/user/register',[UserController::class,'store']);

// // 登入用
Route::post('/user/login',[UserLoginController::class,'UserLogin']);

Route::group(['middleware' => ['auth:api']], function(){
   Route::get('/user', [UserController::class,'show']);
   Route::put('/user', [UserController::class,'update']);
   Route::delete('/user/{api_token}', [UserController::class,'destroy']);
   Route::get('/user',[UserLogoutController::class,'UserLogout']);
});