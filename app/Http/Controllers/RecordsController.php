<?php

namespace App\Http\Controllers;

use App\Models\Records;
use Illuminate\Http\Request;

class RecordsController extends Controller
{
    public function create(Request $request)
    {
        // 驗證前端傳來的資料
        $request->validate([
            'rider' => 'required|string|max:255',
            'start_time_rider' => 'required|date',
            'end_time_rider' => 'required|date',
            // 其他欄位的驗證...
        ]);

        // 創建新的記錄
        Records::create([
            'rider' => $request->input('rider'),
            'start_time_rider' => $request->input('time_start'),
            'end_time_rider' => $request->input('time_end'),
            // 其他欄位...
        ]);

        // 返回成功訊息或重新導向等...
    }
}