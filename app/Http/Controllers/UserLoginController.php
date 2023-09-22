<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    public function UserLogin(Request $request)
    {
        // 用學號查詢
        $user = User::whereStudentid($request->studentID)->first();

        if(Hash::check($request->password, $user->password)){
            return "學號 $user->studentID 登入成功！";
        }
        return '帳號或密碼錯誤';
    }
}
