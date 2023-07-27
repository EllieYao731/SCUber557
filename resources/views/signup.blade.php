@extends('layouts.black')

@section('title', 'SCUber557_signup')

@section('style-black')

@section('style')
    <link rel="stylesheet" href="{{asset('css/style_signup.css') }}">
@endsection

@section('content')
<div id="container">
            <div id="title">
                <h3>請輸入您的學號、密碼</h3>
            </div>
            <div id="number">
                <h3>學號： <input placeholder="請輸入學號"></h3>
            </div>
            <div id="password">
                <h3>密碼：<input type="password"></h3>
            </div>
            <div id="next">
                <a herf="{{ url('/information') }}"><input type="submit" value="下一步"></a>
            </div>
        </div>
    </body>

@endsection
