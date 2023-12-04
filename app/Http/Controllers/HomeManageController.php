<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeManageController extends Controller
{
    public function __construct()
    {
        // 如果 'status' 尚未設定，則設定為 '暫無資訊'
        if (!Session::has('status')) {
            Session::put('status', '暫無資訊');
        }
    }

    public function index()
    {
        $status = Session::get('status', '暫無資訊');
        return view('home', ['status' => $status]);
    }

    public function redirectToHome(Request $request)
    {
        // 檢查是否有 'pairInfo'，如果有則表示已經配對成功
        if (Session::has('pairInfo')) {
            // $pairInfo = Session::get('pairInfo');
            $pairInfo = [
                    'name' => '王小明',
                    'location' => '士林捷運站',
                    'destination' => '東吳大學',
                    'time' => '7/01 10:00',
            ];
            $status = 'pairInfo';
        } else {
            $status = '請耐心等待配對結果...';
            $pairInfo = null; // 沒有配對資訊時，將 $pairInfo 設為 null
        }

        return view('home', ['status' => $status, 'pairInfo' => $pairInfo]);




        // $pairSuccess = request('pair_success', false);

        // if ($pairSuccess) {
        //     $data = [
        //         'message' => null,
        //         'pairInfo' => [
        //             'name' => '王小明',
        //             'location' => '士林捷運站',
        //             'destination' => '東吳大學',
        //             'time' => '7/01 10:00',
        //         ],
        //     ];
        // } else {
        //     $data = [
        //         'message' => '請耐心等待配對結果...',
        //         'pairInfo' => null,
        //     ];
        // }

        // return view('home', $data);
    }

    public function redirectToGoOrLeave(Request $request)
    {
        $buttonClicked = $request->input('button_clicked');
        $request->session()->put('button_clicked', $buttonClicked);
        return view('go-or-leave');
    }

    public function redirectToTimePick(Request $request)
    {
        return view('time-pick');
    }
    public function redirectToDestination(Request $request)
    {
        $buttonClicked = $request->session()->get('button_clicked');
        return view('destination', ['buttonClicked' => $buttonClicked]);
    }

    public function redirectToAD(Request $request)
    {
        $buttonClicked = $request->input('button_clicked');
        if ($buttonClicked === 'choose_driver') {
            Session::put('status', '請耐心等待配對結果...');
            return redirect()->route('home');
        } elseif ($buttonClicked === 'choose_passenger') {
            return redirect()->route('select-driver');
        }

        return redirect()->route('home');
    }

    public function redirectToSelectDriver()
    {
        return view('select-driver');
    }

    public function showSetting()
    {
        return view('setting');
    }
    public function showPersonalInfoUpdate()
    {
        return view('personal_info_update');
    }

}
