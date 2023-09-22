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
use App\Http\Controllers\UserLoginController;

// 註冊用
Route::post('/user/register',[UserController::class,'store']);

// 登入用
Route::post('/user/login',[UserLoginController::class,'UserLogin']);

// 刪除用
Route::delete('/user/{studentID}', [UserController::class,'destroy']);

// 顯示用
Route::get('/user', [UserController::class,'show']);

// 更新用
Route::patch('/user', [UserController::class,'update']);
