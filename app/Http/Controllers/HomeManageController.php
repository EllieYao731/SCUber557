<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeManageController extends Controller
{
    public function redirectToHome()
    {
        $pairSuccess = request('pair_success', false);

        if ($pairSuccess) {
            $data = [
                'message' => null,
                'pairInfo' => [
                    'name' => '王小明',
                    'location' => '士林捷運站',
                    'destination' => '東吳大學',
                    'time' => '7/01 10:00',
                ],
            ];
        } else {
            $data = [
                'message' => '請耐心等待配對結果...',
                'pairInfo' => null,
            ];
        }

        return view('home', $data);
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
