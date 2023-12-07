<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class YourController extends Controller
{
    public function store(Request $request)
    {
        // 驗證請求
        $request->validate([
            'order_ID' => 'required',
            'rider' => 'required',
            'passenger' => 'required',
            'go_or_leave' => 'required',
            'start_time_rider' => 'required',
            'end_time_rider' => 'required',
            'start_time_passenger' => 'required',
            'end_time_passenger' => 'required',
            'success' => 'required',
            // 其他欄位的驗證規則
        ]);

        // 創建模型實例並填充資料
        $record = new Record([
            'order_ID' => $request->input('order_ID'),
            'rider' => $request->input('rider'),
            'passenger' => $request->input('passenger'),
            // 其他欄位的填充
        ]);

        // 儲存資料到資料庫
        $record->save();

        // 可以根據需求進一步處理回應或重定向
        return redirect()->route('your.route.name')->with('success', 'Data has been saved.');
    }
}