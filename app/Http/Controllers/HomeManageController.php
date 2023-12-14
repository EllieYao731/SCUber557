<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeManageController extends Controller
{
    public function __construct()
    {
        Session::put('status', '暫無資訊');

        // // 如果 'status' 尚未設定，則設定為 '暫無資訊'
        // if (Session::get('status')!=null) {
        //     Session::put('status', '暫無資訊');
        // }
    }

    public function index()
    {
        $status = Session::get('status');
        $pairInfo = Session::get('pairInfo');
        return view('home', ['status' => $status,'pairInfo'=>$pairInfo]);
    }

    public function redirectToHome(Request $request)
    {
        $selectedDriverId = $request->input('selectedDriverId');
        Session::forget('pairInfo');
        Session::put('status', '請耐心等待配對結果...');

        return redirect()->route('home');
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
        // $drivers = Driver::all(); // Adjust this according to your database structure and needs
        $drivers = [
            [
                'id' => 'd001',
                'name' => '王小明',
                'rating' => '4.6',
                'car_model' => '機車',
                'color' => '白',
                'license_plate' => 'AAA-1111',
                'location' => '士林捷運站',
                'destination' => '東吳大學',
                'time' => '7/01 10:00',
            ],
            [
                'id' => 'd002',
                'name' => '王小美',
                'rating' => '4.8',
                'car_model' => '汽車',
                'color' => '紅',
                'license_plate' => 'BBB-2222',
                'location' => '中正紀念堂',
                'destination' => '國立台灣大學',
                'time' => '7/02 12:30',
            ],
            [
                'id' => 'd003',
                'name' => '王小華',
                'rating' => '4.5',
                'car_model' => '電動車',
                'color' => '綠',
                'license_plate' => 'CCC-3333',
                'location' => '忠孝復興站',
                'destination' => '台北101',
                'time' => '7/03 15:45',
            ],
        ];
        return view('select-driver', ['drivers' => $drivers]);
    }


    public function showSetting()
    {
        return view('setting');
    }
    public function showPersonalInfoUpdate()
    {
        return view('personal_info_update');
    }

    public function handleMatchForm(Request $request)
    {
        $formAction = $request->input('match_form_action');
        $pairInfo = [
            'name' => '王小明',
            'rating' => '4.6',
            'car_model' => '機車',
            'color' => '白',
            'license_plate' => 'AAA-1111',
            'location' => '士林捷運站',
            'destination' => '東吳大學',
            'time' => '7/01 10:00',
        ];
        $status = Session::get('status');

        if ($formAction === 'agree') {
            Session::put('pairInfo', $pairInfo);
            $status = Session::put('status', null);
            return view('chat-reminder');

        } elseif ($formAction === 'reject') {
            Session::forget('pairInfo');
            return redirect()->route('home');
        }
    }

    public function ChatReminder(Request $request)
    {
        $formAction = $request->input('button_form');
        $pairInfo = Session::get('pairInfo');
        $status = Session::get('status');
        if ($formAction === 'to_chatroom') {
            return view('chat');

        } elseif ($formAction === 'to_home') {
            return redirect()->route('home');
        }
    }
    public function starvalue()
    {
        return view('index');
    }
    public function submitLogin(Request $request)
    {
        // 驗證表單數據
        $request->validate([
            'number' => 'required|numeric|digits:8',
            'password' => 'required',
        ]);
        $status = Session::forget('status');
        return redirect()->route('home'); // 重定向到 home 視圖

    }

}
