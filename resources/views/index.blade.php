<!-- 繼承模板 -->
@extends('layouts.layout')

@section('title', 'SCUber577')

<!-- @section('sidebar')
    @parent

    <p>這邊會附加在主要的側邊欄。</p>
@endsection -->

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
  <link rel="stylesheet"  href="style_index.css">
</head>
<body>
    <div id="container">
        <div id="title">
          <h1>SCUber<i>577</i></h1>
        </div>
        <div id="slogan">
            <h3>&nbsp;&nbsp;&nbsp;GO Home Rapidly&nbsp;<img src="{{ asset('pictures/safe.png') }}" height="30px" width="30px">&nbsp;&nbsp;</h3>
        </div>
        <div id="buttons-container">
          <div id="log_in">
            <button>登入</button>
          </div>
          <div id="sign_up">
            <button>註冊</button>
    </div>
  </div>
</body>
<footer>
  <div id="scooter">
    <img src="{{ asset('pictures/scooter.png') }}" height="100px" width="100px">
  </div>
</html>

@endsection
