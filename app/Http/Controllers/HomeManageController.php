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
            $pairInfo = Session::get('pairInfo');
            $status = null;
        } else {
            $status = '請耐心等待配對結果...';
            $pairInfo = null;
        }
        // return view('home', ['status' => $status, 'pairInfo' => $pairInfo]);
        Session::put('status', $status);
        Session::put('pairInfo', $pairInfo);
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

    public function handleMatchForm(Request $request)
    {
        $formAction = $request->input('match_form_action');

        if ($formAction === 'agree') {
            Session::put('pairInfo', [
                'name' => '王小明',
                'location' => '士林捷運站',
                'destination' => '東吳大學',
                'time' => '7/01 10:00',
            ]);
            $pairInfo = Session::get('pairInfo');
            $status = null;
            return view('home', ['status' => $status, 'pairInfo' => $pairInfo]);

        } elseif ($formAction === 'reject') {
            Session::forget('pairInfo');
            $status = '請耐心等待配對結果...';
            $pairInfo = null;
        }
        Session::put('status', $status);
        Session::put('pairInfo', $pairInfo);
        return redirect()->route('home');
    }
}
