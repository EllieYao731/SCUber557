<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try{
            $request->validate([ //
                'name' => 'required|string|max:255',
                'studentID'=> 'required|string|max:255',
                'gender'=> 'required|string|max:255',
                'mobile'=> 'required|string|max:255',
                'riderFlag'=> 'required|boolean|max:255',
                'email' => 'required|string|max:255',
                'password' => 'required|string|max:255'
            ]);
        } catch (ValidationException $exception) {
            // https://ithelp.ithome.com.tw/articles/10214612 根據欄位名稱使用不同的錯誤訊息
            // 取得 laravel Validator 實例
            $validatorInstance = $exception->validator;
            // 取得錯誤資料
            $errorMessageData = $validationInstance->getMessageBag();
            // 取得驗證錯誤訊息
            $errorMessages = $errorMessageData->getMessages();
        }
        // return "test";
        $api_token= Str::random(10);
        $Create=User::create([
            'name' =>$request['name'],
            'studentID' =>$request['studentID'],
            'gender' =>$request['gender'],
            'mobile' =>$request['mobile'],
            'riderFlag' =>$request['riderFlag'],
            'email' =>$request['email'],
            'password' => $request['password'],
            'api_token' => $api_token
        ]);

        if ($Create)
            return "註冊成功...$api_token";
        else
            return "註冊失敗，請再試一次";

    }

// 查詢
    public function show()
    {
        // 經過身份驗證的使用者
        return Auth::user();
    }


// 修改
    public function update(Request $request)
    {
        $request->validate([
            'name',
            'email' => 'unique:users|email',
            'password',
        ]);

        // 驗證使用者 => 修改更新（取得所有輸入資料）
        Auth::user()->update($request->all());

        echo  '資料修改成功，以下爲修改結果';
        return  $request->all();

    }


    // 刪除
    public function destroy($api_token)
    {
        $user = User::where('api_token',$api_token);
        if ($user && $user -> delete()){ // 若條件符合就刪除
            return 'User deleted successfully';
        }
        else{
            return '未成功刪除';
        }
    }
}
