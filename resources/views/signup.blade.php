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
    footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    text-align: center;
    height: 30px; /* Set the height to match the height of the image */
    padding-top: 10px; /* Adjust the top padding to give some space above the text */
    display: flex; /* Use flexbox to center content */
    justify-content: center; /* Center content horizontally */
    align-items: center; /* Center content vertically */
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
    #number, #name, #password, #email {
      color: #fff;
    }

    #gender, .select-wrapper .select-dropdown li>span.white-text {
      color: #fff !important;
    }

    .input-field select option+ label{
    color: #fff;
}

  </style>
@endsection

@section('back-link', '/')

@section('content-black')

<div class="row">
    <div class="col s12">
      <div id="center-content">
        <h4>請輸入您的基本資料</h4>
        <div class="row">
          <div class="col s12 m8 offset-m2 l6 offset-l3">
            <form class="col-sm">
              <div class="row">
                <div class="input-field col s12">
                  <input id="number" type="text" class="validate">
                  <label for="number">學號</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="name" type="text" class="validate">
                  <label for="name">姓名</label>
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
                  <select>
                    <option value="1" class="white-text">男</option>
                    <option value="2" class="white-text">女</option>
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
            <div class="row">
              <div class="col s12">
                <div id="next">
                <a href="#"><input type="submit" value="下一步"></a>
                </div>
              </div>
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
@endsection
