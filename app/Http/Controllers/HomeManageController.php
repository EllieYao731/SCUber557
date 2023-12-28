<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Records;
use Illuminate\Support\Facades\Cookie;

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
        Session::put('selectedDriverId', $selectedDriverId);
        Session::forget('pairInfo');
        Session::put('status', '請耐心等待配對結果...');

        return redirect()->route('home');
    }

    public function redirectToGoOrLeave(Request $request)
    {
        $studentID = Cookie::get('studentID');
        // dd($studentID);
        $driver_or_passenger = $request->input('button_clicked');
        $request->session()->put('driver_or_passenger', $driver_or_passenger);
        return view('go-or-leave');
    }

    public function redirectToTimePick(Request $request)
    {
        $go_or_leave = filter_var($_POST['go_or_leave'], FILTER_VALIDATE_BOOLEAN);
        $request->session()->put('go_or_leave', $go_or_leave);
        return view('time-pick');
    }
    public function redirectToDestination(Request $request)
    {
        $time_start = $request->input('time_start');
        $time_end = $request->input('time_end');
        $request->session()->put('time_start', $time_start);
        $request->session()->put('time_end', $time_end);
        $go_or_leave = Session::get('go_or_leave');
        if ($go_or_leave === true) {
            $default_origin = '士林捷運站';
            $default_destination = '東吳大學';
        }elseif ($go_or_leave === false){
            $default_destination = '士林捷運站';
            $default_origin = '東吳大學';
        }
        return view('destination',['default_origin' => $default_origin,'default_destination'=>$default_destination]);
    }

    public function redirectToAD(Request $request)
    {
        $driver_or_passenger =Session::get('driver_or_passenger');
        $go_or_leave = Session::get('go_or_leave');
        $time_start = Session::get('time_start');
        $time_end = Session::get('time_end');
        $origin = $request->input('origin');
        $destination = $request->input('destination');

        // dd($driver_or_passenger,$go_or_leave,$time_start,$time_end,$origin,$destination);
        $studentID = Cookie::get('studentID');
        if ($driver_or_passenger === 'choose_driver') {
            Session::put('status', '請耐心等待配對結果...');
            Records::create([
                'rider' => $studentID,
                'passenger' => null,
                'go_or_leave' => $go_or_leave,
                'start_time_rider' => $time_start,
                'end_time_rider' => $time_end,
                'start_time_passenger' => null,
                'end_time_passenger' => null,
                'origin' => $origin,
                'destination' => $destination,
                'success' => false
            ]);
            return redirect()->route('home');
        } elseif ($driver_or_passenger === 'choose_passenger') {
            Records::create([
                'rider' => null,
                'passenger' => $studentID,
                'go_or_leave' => $go_or_leave,
                'start_time_rider' => null,
                'end_time_rider' => null,
                'start_time_passenger' => $time_start,
                'end_time_passenger' => $time_end,
                'origin' => $origin,
                'destination' => $destination,
                'success' => false

            ]);
            return redirect()->route('select-driver');
        }

        return redirect()->route('home');
    }

    public function redirectToSelectDriver()
    {
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
    public function pair(Request $request)
    {
        $driver_or_passenger =Session::get('driver_or_passenger');
        if ($driver_or_passenger === 'choose_passenger') {
            $drivers = Session::get('drivers');
            $driver_pick = collect($drivers)->first(function ($driver) {
                return $driver['id'] === Session::get('selectedDriverId');
            });
        }elseif ($driver_or_passenger === 'choose_driver') {

        }
        dd($driver_pick);

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
