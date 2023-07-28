@extends('layouts.black')

@section('title', 'SCUber557_signup')

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
#center-content h4{
    text-align: center;
    color: white;
    margin: 0; /* 清除上下的外邊距 */
    }
</style>
@endsection

@section('back-link', '/')

@section('content-black')

<div class="row">
    <div class="col s10 offset-s1"> <!-- 使用 .col s6 offset-s3 佈局表單 -->
      <div id="center-content">
        <h4>請輸入您的基本資料</h4>
        <div class="row">
          <div class="col s8 offset-s2"> <!-- 使用 .col s6 offset-s3 佈局表單 -->
            <form class="col-sm">
              <!-- 表單內容 -->
              <div class="row">
                <div class="input-field col s12">
                  <input id="name" type="text" class="validate">
                  <label for="name">姓名</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <select>
                    <option value="1">男</option>
                    <option value="2">女</option>
                  </select>
                  <label>性別</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="email" type="email" class="validate">
                  <label for="email">Email</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="number" type="tel" class="validate">
                  <label for="number">電話號碼</label>
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
  </div>

@endsection