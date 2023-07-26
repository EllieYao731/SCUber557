@extends('layouts.layout')

@section('title', 'SCUber577_login')

@section('style')
    <link rel="stylesheet" href="{{asset('css/style_login.css') }}">
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
        <div id="forget">
            <a href="forget.html"><p>忘記密碼？</a></p>
        </div>
        <div id="next">
            <a href="{{ url('/home') }}"><input type="submit" value="下一步"></a>
        </div>
    </div>
    <footer>
        <div id="scu">
            <h1>SCUber<i>577</i></h1>
        </div>
        <div class="moving-image">
            <img src="{{ asset('pictures/people_scooter.png') }}" alt="騎車圖片">
        </div>
    </footer>
@endsection