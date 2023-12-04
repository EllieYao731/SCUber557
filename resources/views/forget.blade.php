@extends('layouts.black')

@section('title', 'SCUber577_forget')

@section('style-black')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style>
   
   #center-content {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh; /* 設定高度為整個視窗的高度 */
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

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 80%;
      margin: 0 auto 5% auto;
    }

    .container svg {
      display: block;
      width: 10%;
    }

    .input-group {
      width: 90%;
      display: flex;
      flex-direction: column;
      margin: 0 5% 0 5%;
      justify-content: space-between;
    }

    input {
      color: white;
    }

    .button {
      background-color: black;
      color: #fff;
      border: 2px solid #fff;
      padding: 10px 0px;
      font-size: 15px;
      margin: 18px 0;
      text-align: center;
      width: 80%;
    }

    .button:hover {
      background-color: #fff;
      color: #1a1a1a;
    }

    .btn-group {
      display: flex;
      padding: 2%;
      justify-content: center;
      flex-direction: column;
      align-items: center;
    }

    .btn-transparent {
      border: none;
      background-color: transparent;
      color: white;
      text-align: left;
      font-size: large;
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

    #scu {
      color: aliceblue;
      padding: 10px;
      animation: scu 1.5s ease-in-out infinite alternate;
      margin: 0 auto; /* 調整上邊距為 0，並將左右邊距設置為自動以實現水平置中 */
      text-align: center;
    }

    /* Add the following style rule for the button and its container */
    .container .btn-container {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .container .btn-container a {
      margin: 0 10px;
    }

    footer {
      position: absolute;
      bottom: 10px;
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

@section('content-black')
  <div class="row">
    <div class="col s12">
      <div id="center-content">
        <h4>請輸入您的學號</h4>
        <div class="row">
          <div class="col s12 m8 offset-m2 l6 offset-l3">
            <form class="col-sm">
              <!-- 表單內容 -->
              <div class="row">
                <div class="input-field col s12">
                  <input id="number" type="text" class="validate">
                  <label for="number">學號</label>
                </div>
              </div>
            </form>
            <div class="container">
              <div class="container" style="text-align: center;">
                <!-- Modified button container -->
                <div class="btn-container">
                  <a class="waves-effect waves-light btn modal-trigger white black-text" href="#modal1">確定</a>
                </div>
                <div id="modal1" class="modal bottom-sheet" style="height: 50%; background-color: black; left: 10%; width: 80%;">
                  <div class="modal-content">
                    <h5>密碼已發送到您的信箱</h5>
                  </div>
                  <div class="modal-footer btn-group" style="background-color: black; height:auto; display: flex;">
                    <a href="" class="button modal-close waves-effect">再次寄出</a>
                    <a href="{{url('/login')}}" class="button">回到登入頁面</a>
                  </div>
                </div>
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
</div>
@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var elems = document.querySelectorAll('.modal');
      var instances = M.Modal.init(elems, {
        endingTop: '100%',
        startingTop: '100%',
      });
    });
  </script>
@endsection
