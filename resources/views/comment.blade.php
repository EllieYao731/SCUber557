@extends('layouts.black')

@section('title', 'SCUber577_comment')

@section('style-black')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style>
    /* Target both the input and textarea inside .input-field */
    .input-field input,
    .input-field textarea {
      color: #fff !important;
    }

    /* Center-align the content */
    #center-content {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh; /* Set the height to the full viewport height */
    }
  </style>
@endsection

@section('content-black')
  <div class="row">
    <div class="col s12">
      <div id="center-content" class="center-align">
        <h4>請為您的駕駛評分</h4>
        <form class="col-sm" action="{{ url('/home') }}" method="GET">
          <div id="test-slider" class="row">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
              <p class="range-field">
                <input type="range" id="test5" min="0" max="100" />
              </p>
              <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="textarea1" class="materialize-textarea" maxlength="20"></textarea>
                      <label for="textarea1">留下評論</label>
                      <span id="textarea1-counter" class="character-counter"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div id="next">
                <button class="btn waves-effect waves-light" type="submit">完成</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
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

      var textarea = document.getElementById('textarea1');
      var characterCounter = document.getElementById('textarea1-counter');

      textarea.addEventListener('input', function () {
        var count = textarea.value.length;
        characterCounter.innerText = count + "/20";

        // Change color to white
        characterCounter.style.color = 'white';
      });
    });
  </script>
@endsection
