<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;


class UserController extends Controller
{
    // 註冊
    public function store(Request $request)
    {
        try{
            $validator = $request->validate(
            [ // 驗證內容 // 問題：沒有寫性別時他會跳錯誤，而不是使用者提醒
                'name' => 'required|string|max:255',
                'studentID'=> 'required|string|digits:8', //限定 8 位數
                'gender'=> 'required|string|max:10', 
                'mobile'=> 'required|string|digits:10',
                'riderFlag'=> 'required|boolean|max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|string|max:255',
            ],
            [   // 錯誤訊息
                // 欄位名稱.驗證方法名稱
                "studentID.required" => "學號為必填資料",
                "name.required" => "姓名為必填資料",
                "gender.required" => "性別為必填資料",
                "email.required" => "Email為必填資料",
                "mobile.required" => "電話號碼為必填資料",
                "password.required" => "密碼為必填資料"
                // "userId.exists" => '使用者 ID 必須存在於資料庫中',
                // "postId.integer" => "文章 ID 必須為數值",
                // "postId.exists" => "文章 ID 不存在"
            ]);
        }catch (ValidationException $exception) {
            // https://ithelp.ithome.com.tw/articles/10214612 根據欄位名稱使用不同的錯誤訊息
            // 取得 laravel Validator 實例
            $validatorInstance = $exception->validator;
            // 取得錯誤資料
            $errorMessageData = $validatorInstance->getMessageBag();
            dump($errorMessageData);
            // 取得驗證錯誤訊息
            // $errorMessages = $errorMessageData->getMessages();
            // dump($errorMessages);
            // $exception->validator->getMessageBag();

            return Redirect::back()->withInput()->withErrors($errorMessageData->all())->withInput();
        };

        $api_token= Str::random(10);

        // 時間戳記
        date_default_timezone_set('Asia/Taipei');

        if (User::whereStudentid($request->studentID)->first()){ // 若學號、email已被註冊過
            return "該帳號已被註冊過";
        }

        if (User::whereStudentid($request->studentID)->first()){ // 若學號、email已被註冊過
            return "該帳號已被註冊過";
        }

        $Create=User::create([
            'name' =>$request['name'],
            'studentID' =>$request['studentID'],
            'gender' =>$request['gender'],
            'mobile' =>$request['mobile'],
            'riderFlag' =>$request['riderFlag'],
            'email' =>$request['email'],
            'password' => $request['password'],
            'api_token' => $api_token,
            'created_at' => date("Y-m-d H:i:s"), 
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        if ($Create)
        {
            return redirect('/home')->with('success', 'your message,here');
        }

    }

    // 查詢
    public function show(Request $request)
    {
        $userQuery = User::whereStudentid($request->studentID)->first();
        if ($userQuery==null){
            return "查無資料";
        }
        if (Cookie::get('api_token') == $userQuery->api_token){ // 用 token 去驗證登入
            return "取得的資料為" . $userQuery;
        }
    }


    // 修改
    public function update(Request $request)
    {
        $userQuery = User::whereStudentid($request->studentID)->first();
        if ($userQuery==null){ // 若找不到資料
            return "查無資料";
        }
        if(Cookie::get('api_token') == $userQuery->api_token){ // 用 token 去驗證登入
            $obj = $request->all();
            try{
                foreach( $obj as $key => $value ){ // 一個一個更改欄位
                    if ($key != "studentID"){ // 學號不能更改
                        $userQuery =  User::whereStudentid($request->studentID)->first();
                        User::whereStudentid($request->studentID)->update([$key => $value]);
                        echo "已將 $key 從 " . $userQuery->$key . " 改成 $value \n";
                    }
                }
                echo "完成";
            }catch(Exception $err) {
                echo 'Message: ' .$err->getMessage();
            }
        }
    }

    // 刪除
    public function destroy($studentID)
    {
        // 用學號查詢
        $userQuery = User::whereStudentid($studentID)->first();

        if (!$userQuery){
            return "找不到欲刪除的使用者";
        }
        if (Cookie::get('api_token') == $userQuery->api_token){ // 用 token 去驗證登入
            if (User::whereStudentid($studentID)-> delete()){ // 若條件符合就刪除
                return 'User ' . $studentID .  'deleted successfully';
            }
        }else if ($userQuery==null){ // 若找不到資料
            return "查無資料";
        }
        else{
            return '未成功刪除';
        }
    }
}
