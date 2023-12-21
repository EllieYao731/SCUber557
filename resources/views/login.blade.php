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
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

    #center-content h4 {
    display: block;
    color: white;
    margin: 0;
    white-space: nowrap;
}
    .col s12 m8 offset-m2 l6 offset-l3 {
    margin: 0 auto;
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
    0%, 100% {
        text-shadow: 0 0 20px #fff, 0 0 100px #fff, 0 0 20px #fff;
        color: initial; /* 重置顏色 */
    }
    50% {
        text-shadow: 0 0 10px red, 0 0 20px red, 0 0 10px red;
        color: red !important;
    }
}
    #next {
    text-align: center; /* 將按鈕置中 */
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
    #password {
    color: #fff;
  }

   #number {
    color: #fff;
  }
  footer {
  position: absolute;
  bottom: 10px; /* 調整 bottom 的值來上移 */
  width: 100%;
  text-align: center;
  height: 30px;
  padding-top: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
}

    </style>

@endsection

@section('content')
@section('back-link', '/')

@section('content-black')

<div class="row">
  <div class="col s12">
    <div id="center-content">
      <h4>請輸入您的學號、密碼</h4>
      <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
        <form id="loginForm" class="col-sm" action="api/user/login" method="post">
    @csrf
    <!-- 表單內容 -->
    <div class="row">
        <div class="input-field col s12">
            <input id="number" name="studentID" type="text" class="validate white-text-input" pattern="[0-9]{8}" required>
            <label for="studentID">學號</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input id="password" name="password" type="password" class="validate white-text-input" required>
            <label for="password">密碼</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <div id="forget">
                <a href="forget"><p>忘記密碼？</p></a>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col s12">
          <div id="next">
            <button type="submit" value="登入" style="width:5em;height:2em" onclick="validateForm()">登入</button>
          </div>
      </div>
    </div>
  </form>
          <!-- <div class="row"> 使用 .row 來包含 <div id="next">
            <div class="col s12">  使用 .col s12 佈局 <div id="next">
              <div id="next">
                <input type="button" value="下一步" onclick="validateForm()">
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</div>

<footer>
  <div id="scu">
  <h4>SCUber<i>577</i></h4>
  </div>
</footer>

<script>
      function validateForm() {
        var inputs = document.querySelectorAll('#loginForm input.validate');
        var isValid = true;

        for (var i = 0; i < inputs.length; i++) {
          if (!inputs[i].value.trim()) {
            isValid = false;
            alert('請確保所有欄位皆已填寫！');
            break;
          }
        }

        if (isValid) {
          // 如果所有字段都已填写，提交表單
          document.getElementById('loginForm').submit();
        }
      }
    </script>
@endsection
