<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignUp extends Controller
{
    public function signUpProcess(Request $request)
    {
        echo $request->input('name');
        echo "<br>";
        echo $request->input('StudentID');
        echo "<br>";
        echo $request->input("gender");
    }
}
