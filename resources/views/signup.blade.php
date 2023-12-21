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

    /* Add the following style rule for the radio buttons */
    #center-content input[type="radio"].with-gap:checked+span:after {
      border: 2px solid #fff; /* Set the border color when the radio button is checked */
    }

    #center-content input[type="radio"].with-gap:checked+span {
      color: #fff; /* Set the text color when the radio button is checked */
    }


    @keyframes scu {
      0%, 100% {
        text-shadow: 0 0 20px #fff, 0 0 100px #fff, 0 0 20px #fff;
        color: initial;
      }
      50% {
        text-shadow: 0 0 10px red, 0 0 20px red, 0 0 10px red;
        color: red !important;
      }
    }

    .back-button {
      background-color: #1a1a1a;
      padding: 10px;
      margin-left: 4%;
      margin-top: 4% !important;
    }
    
    #center-content input[type="radio"].with-gap {
    margin-right: 5px; /* Adjust the margin as needed */
}

    #scu {
      color: aliceblue;
      padding: 10px;
      animation: scu 1.5s ease-in-out infinite alternate;
    }

    #number,
    #name,
    #password,
    #email {
      color: #fff;
    }

    #number {
      margin-bottom: 10px;
    }

    #password {
      margin-bottom: 10px;
    }

    #gender ,#riderFlag{
        margin-right: 110px;
        display: flex;
        align-items: center;
        justify-content: flex-start; /* 將內容水平左對齊 */
    }


    #gender h3 {
        margin-right: 10px; /* 元素之間的間距 */
    }

    #tel{
        margin-right: 30px;
    }

    #mail{
        margin-right: 30px;
    }

    #next {
      margin-top: 50px;
    }

    #next:hover {
        transform: scale(1.5); /* 將按鈕放大 20% */
    }

</style>
@endsection

@section('back-link', '/')

@section('content-black')

<script type="text/javascript">
    function save_to_cookie(){
        let studentID = document.getElementById("studentID").value;
        let password = document.getElementById("password").value;

        document.cookie ="studentID="+studentID+";password="+password;
    }
</script>

<div class="row">
  <div class="col s12">
    <div id="center-content">
      <h4>請輸入您的基本資料</h4>
      <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
          <form action="/api/user/register" method="post">
            <div class="row">
              <div class="input-field col s12">
                <input id="studentID" type="text" class="validate" name="studentID">
                <label for="number">學號</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="name" type="text" name="name" class="validate">
                <label for="name">姓名</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="password" type="password" class="validate" name="password">
                <label for="password">密碼</label>
              </div>
            </div>
            <div class="row">
    <div class="input-field col s12">
        <label>性別</label>
        <!-- <p>
            <label>
                <select name="gender">
                    <option value="male"><span class="white-text">男</span></option>
                    <option value="female"><span class="white-text">女</span></option>
                </select>
            </label>
        </p> -->
        <p>
            <label>
                <input name="gender" type="radio" value="male" class="with-gap" />
                <span class="white-text">男</span>
            </label>

            <label>
                <input name="gender" type="radio" value="female" class="with-gap" />
                <span class="white-text">女</span>
            </label>
        </p>
    </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="email" type="email" class="validate" name="email">
                <label for="email">Email</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="number" type="tel" class="validate" name="mobile">
                <label for="number">電話號碼</label>
              </div>
            </div>
            <div class="input-field col s12">
                <label>是否為騎士</label>
                <p>
                    <label>
                        <input name="riderFlag" type="radio" value="1" class="with-gap" />
                        <span class="white-text">是</span>
                    </label>

                    <label>
                        <input name="riderFlag" type="radio" value="0" class="with-gap" />
                        <span class="white-text">否</span>
                    </label>
                </p>
            </div>
            <div class="row">
                <div class="col s12">
                  <div id="next">
                    <button type="submit" value="註冊" style="width:5em;height:2em">註冊</button>
                  </div>
                </div>
            </div>
          </form>
          <!-- <div class="row">
            <div class="col s12">
              <div id="next">
                <button type="submit" value="註冊" style="width:5em;height:2em">註冊</button>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
    <!-- @if($errors->count())
        @foreach ($errors->all() as $error)
            <div class="alert">
                <b>{{$errors}}</b>
            </div>
        @endforeach
    @endif -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>
<!-- 
<div id="container">
            <form action="/api/user/register" method="post">
                <div id="title">
                    <h3>請輸入您的學號、密碼</h3>
                </div>
                <div id="number">
                    <h3>學號： <input id="studentID" name="studentID" placeholder="請輸入學號"></h3>
                </div>
                <div id="password">
                    <h3>密碼：<input id="password" name="password" type="password"></h3>
                </div>
                <div id="title">
                    <h2>請輸入您的基本資料</h2>
                </div>
                <div id="name">
                    <h3>姓名： <input type="text" name="name"></h3>
                </div>
                <div id="gender">
                    <h3>性別：</h3>
                    <select name="gender">
                        <option value="male">男</option>
                        <option value="female">女</option>
                    </select>
                </div>
                <div id="riderFlag">
                    <h3>是否為騎士：</h3>
                    <select name="riderFlag">
                        <option value="1">是</option>
                        <option value="0">否</option>
                    </select>
                </div>
                <div id = "mobile">
                    <h3>手機號碼：<input type="mobile" name="mobile"></h3>
                </div>
                <div id="email">
                    <h3>電子郵件：<input type="email" name="email"></h3>
                </div>

                <button type="submit" value="註冊" style="width:5em;height:2em">註冊</button>

            </form>
        </div>
         -->

@endsection