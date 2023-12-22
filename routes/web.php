<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageRecognitionController;
use App\Http\Controllers\RecordsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index'); // 打開 index.blade.php
});

Route::get('/question', function () {
    return view('question');
});

Route::get('/login', function () {
    return view('login');
});


Route::get('/personal_info_update', function () {
    return view('personal_info_update');
});

Route::get('/no_message', function () {
    return view('no_message');
});

Route::get('/chat', function () {
    return view('chat');
});

Route::get('/signup', function () {
    return view('signup');
});

/*Route::get('/information', function () {
    return view('information');
});
*/
Route::get('/forget', function () {
    return view('forget');
});

Route::get('/comment', function () {
    return view('comment');
});

Route::get('/test', [ImageRecognitionController::class, 'showUploadForm'])->name('showUploadForm');
Route::post('/test', [ImageRecognitionController::class, 'uploadAndRecognize'])->name('uploadAndRecognize');

Route::post('/records/create', [RecordsController::class, 'create']);


use App\Http\Controllers\SignUp;
Route::post('/sign-up', [SignUp::class,'signUpProcess']);


use App\Http\Controllers\HomeManageController;

Route::get('/pair', function () {
    return view('pair');
});
// Route::get('/chat-reminder', function () {
//     return view('chat-reminder');
// });

Route::get('/home', [HomeManageController::class, 'index'])->name('home')->middleware('web');
Route::post('/redirect-to-home', [HomeManageController::class, 'redirectToHome'])->name('redirect.to.home')->middleware('web');
Route::post('/redirect-to-go-or-leave', [HomeManageController::class, 'redirectToGoOrLeave'])->name('redirect.to.go-or-leave');
Route::post('/redirect-to-time-pick', [HomeManageController::class, 'redirectToTimePick'])->name('redirect.to.time-pick');
Route::post('/redirect-to-destination', [HomeManageController::class, 'redirectToDestination'])->name('redirect.to.destination');
Route::get('/select-driver', [HomeManageController::class, 'redirectToSelectDriver'])->name('select-driver');
Route::post('/redirect-to-ad', [HomeManageController::class, 'redirectToAD'])->name('redirect.to.ad');
Route::post('/setting', [HomeManageController::class, 'showSetting'])->name('setting');
Route::post('/personal_info_update', [HomeManageController::class, 'showPersonalInfoUpdate'])->name('personal_info_update');
Route::post('/chat-reminder', [HomeManageController::class, 'handleMatchForm'])->name('matchform');
Route::post('/chat-room', [HomeManageController::class, 'ChatReminder'])->name('chat-reminder');
Route::post('/comment', [HomeManageController::class, 'starvalue'])->name('submitRating');
Route::post('/login', [HomeManageController::class, 'submitLogin'])->name('home.post');

// 密碼忘記寄 email
use App\Mail\ForgetPWD;
use Illuminate\Support\Facades\Mail;

Route::get('/reset-password', function() {
    return view('/reset-password');
    // $name = "使用者";

    // // The email sending is done using the to method on the Mail facade
    // Mail::to('evonne731@gmail.com')->send(new ForgetPWD($name));
});
