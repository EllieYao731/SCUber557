<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserLoginController extends Controller
{
    public function UserLogin(Request $request)
    {
        // // 用學號查詢
        // $user = User::whereStudentid($request->studentID)->first();
        // $apiToken = Str::random(10);

        // if(Hash::check($request->password, $user->password)){
        //     // $value = $request->cookie('key');
        //     return "學號 $user->studentID 登入成功！";
        // }
        // return '帳號或密碼錯誤';
        
        // 用學號查詢
        $user = User::whereStudentid($request->studentID)->first();
        $apiToken = Str::random(10);
        if(Hash::check($request->password, $user->password)){
            if (User::whereStudentid($request->studentID)->update(['api_token'=>$apiToken])) { // 更新 token 
                // setcookie('api_token', $apiToken, time()+ 3600);

                // $LoginUser = Auth::user();
                // Auth::login($LoginUser);

                // Auth::login($user);
                Auth::guard('web')->login($user);

                // if (Auth::check()) {
                //     return "登入成功！";
                // }

                // echo $_COOKIE['api_token']; 

                return redirect()->route('home')
                ->with('msg', "學號 $user->studentID 登入成功！")
                ->withCookie(cookie('api_token', $apiToken, 60))
                ->withCookie(Cookie::make('studentID', $request->studentID, 60, '/', null, false, false));

                // return "學號 $user->studentID 登入成功！";
            }
        }
        return '帳號或密碼錯誤';

        // 使用 Auth::attempt 进行身份验证
        // if (Auth::attempt($credentials)) {
        //     // 获取已登录用户
        //     $user = Auth::user();

        //     // 生成新的 api_token
        //     $apiToken = Str::random(10);

        //     // 更新用户的 api_token
        //     $user->api_token = $apiToken;
        //     $user->save();

        //     // 设置 Cookie
        //     return redirect()->route('home')
        //         ->with('msg', "學號 $user->studentID 登入成功！")
        //         ->withCookie(cookie('api_token', $apiToken, 60))
        //         ->withCookie(Cookie::make('studentID', $request->studentID, 60, '/', null, false, false));
        // }
    }
}
