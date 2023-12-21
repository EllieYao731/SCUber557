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
        <label>性別</label>
        <p>
            <label>
                <input name="gender" type="radio" value="1" class="with-gap" />
                <span class="white-text">男</span>
            </label>

            <label>
                <input name="gender" type="radio" value="2" class="with-gap" />
                <span class="white-text">女</span>
            </label>
        </p>
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
  <footer>
    <div id="scu">
      <h4>SCUber<i>577</i></h4>
    </div>
  </footer>

</div>

@endsection
