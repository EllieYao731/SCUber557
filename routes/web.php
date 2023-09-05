<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageRecognitionController;
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
    return view('index');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/select-driver', function () {
    return view('select-driver');
});

Route::get('/go-or-leave', function () {
    return view('go-or-leave');
});

Route::get('/destination', function () {
    return view('destination');
});

Route::get('/time-pick', function () {
    return view('time-pick');
});

Route::get('/setting', function () {
    return view('setting');
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

Route::get('/information', function () {
    return view('information');
});

Route::get('/forget', function () {
    return view('forget');
});

Route::get('/test', [ImageRecognitionController::class, 'showUploadForm'])->name('showUploadForm');
Route::post('/test', [ImageRecognitionController::class, 'uploadAndRecognize'])->name('uploadAndRecognize');

use App\Http\Controllers\SignUp;
Route::post('/sign-up', [SignUp::class,'signUpProcess']);
