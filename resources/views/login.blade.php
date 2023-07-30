@extends('layouts.black')

@section('title', 'SCUber577_login')

@section('style-black')
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('select');
      var instances = M.FormSelect.init(elems);
    });
  </script>
  <style>
    #center-content {
      text-align: center;
    }

    #center-content h4 {
      display: inline-block;
      color: white;
      margin: 0;
      white-space: nowrap;
    }

    #center-content .row {
      white-space: nowrap;
    }

    #forget {
      font-size: 15px;
      position: absolute;
      bottom: 60px;
      right: 15px;
    }

    @keyframes scu {
        0%,
        100% {
        text-shadow: 0 0 20px #fff, 0 0 100px #fff, 0 0 20px #fff;
        }
        50% {
        text-shadow: 0 0 50px #fff, 0 0 150px #fff, 0 0 50px #fff;
        color: red;
        }
    }
  
    #scu {
        color: aliceblue;
        padding: 10px;
        animation: scu 1.5s ease-in-out infinite alternate;
    }
    </style>

@endsection

@section('content')
@section('back-link', '/')

@section('content-black')

<div class="row">
    <div class="col s12"> <!-- 使用 .col s6 offset-s3 佈局表單 -->
      <div id="center-content">
        <h4>請輸入您的學號、密碼</h4>
        <div class="row">
          <div class="col s12"> <!-- 使用 .col s6 offset-s3 佈局表單 -->
            <form class="col-sm">
              <!-- 表單內容 -->
              <div class="row">
                <div class="input-field col s12">
                  <input id="number" type="text" class="validate">
                  <label for="number">學號</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="password" type="password" class="validate">
                  <label for="password">密碼</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <div id="forget">
                    <a href="forget.html"><p>忘記密碼？</p></a> 
                  </div>
                </div>
              </div>
            </form>
            <div class="row"> <!-- 使用 .row 來包含 <div id="next"> -->
              <div class="col s12"> <!-- 使用 .col s12 佈局 <div id="next"> -->
                <div id="next">
                  <a href="#"><input type="submit" value="下一步"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="scu">
      <h1>SCUber<i>577</i></h1>
    </div>
  </div>
@endsection