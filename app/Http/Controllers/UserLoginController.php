<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

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
                setcookie('api_token', $apiToken, time()+ 3600);
                // echo $_COOKIE['api_token']; 
                return "學號 $user->studentID 登入成功！";
            }
        }
        return '帳號或密碼錯誤';
    }
}
