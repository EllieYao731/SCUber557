@extends('layouts.layout')

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
                  <input id="name" type="text" class="validate">
                  <label for="name">學號</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="email" type="password" class="validate">
                  <label for="email">密碼</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <div id="forget">
                    <a href="forget.html"><p>忘記密碼？</p></a> <!-- 这里的标签闭合有问题 -->
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