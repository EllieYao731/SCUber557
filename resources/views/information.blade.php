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
#center-content {
  text-align: center; /* 水平居中 #center-content 內容 */
}

#center-content h4 {
  display: inline-block; /* 設置為行內元素，使其保持在同一行 */
  color: white;
  margin: 0; /* 清除上下的外邊距 */
  white-space: nowrap; /* 防止文字換行 */
}

#center-content .row {
  white-space: nowrap; /* 防止 .row 元素內容換行 */
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
  .back-button {
 		background-color: #1a1a1a;
 		padding: 10px;
 		margin-left: 4%;
 		margin-top: 4% !important; 
    }
  #scu {
    color: aliceblue;
    padding: 10px;
    animation: scu 1.5s ease-in-out infinite alternate;
  }
</style>
@endsection

@section('back-link', '/')

@section('content-black')

<div class="row">
    <div class="col s12"> <!-- 使用 .col s6 offset-s3 佈局表單 -->
      <div id="center-content">
        <h4>請輸入您的基本資料</h4>
        <div class="row">
          <div class="col s12 m8 offset-m2 l6 offset-l3"> <!-- 使用 .col s6 offset-s3 佈局表單 -->
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
    <div id="scu">
            <h1>SCUber<i>577</i></h1>
        </div>
        <div class="moving-image">
            <img src="{{ asset('pictures/people_scooter.png') }}" alt="騎車圖片">
        </div>
  </div>
@endsection