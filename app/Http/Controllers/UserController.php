<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\UserController;


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
        // $api_token= Str::random(10);
        $Create=User::create([
            'name' =>$request['name'],
            'studentID' =>$request['studentID'],
            'gender' =>$request['gender'],
            'mobile' =>$request['mobile'],
            'riderFlag' =>$request['riderFlag'],
            'email' =>$request['email'],
            'password' => $request['password']
        ]);

        if ($Create)
            return "註冊成功...";
        else
            return "註冊失敗，請再試一次";

    }

// 查詢
    public function show(Request $request)
    {
        $userQuery = User::whereStudentid($request->studentID)->first();
        return "取得的資料為" . $userQuery;
    }


// 修改
    public function update(Request $request)
    {
        if(true){ // 確認身份or有登入後才能更改
            $obj = $request->all();
            // echo $obj->name;
            try{
                foreach( $obj as $key => $value ){
                    if ($key != "studentID"){
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
    public function destroy()
    {
        // 用學號查詢
        if (User::whereStudentid($studentID)-> delete()){ // 若條件符合就刪除
            return 'User deleted successfully';
        }
        else{
            return '未成功刪除';
        }
    }
}
