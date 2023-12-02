<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Records extends Model
{
    use HasFactory;
}



namespace App\Models;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // public $timestamps = false;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [          
        // 使用批量分配（ Mass Assignment ）的填充白名單
        'name', 'studentID', 'gender','mobile', 'riderFlag','email', 'password', 'api_token','created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

     /**
     * 日期時間的儲存格式
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s';
}



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


