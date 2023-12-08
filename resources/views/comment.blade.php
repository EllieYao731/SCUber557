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

    /* Rating stars styling */
    /* Rating stars styling */
.rating {
  font-size: 36px;
  cursor: pointer;
  align-items: center;
  justify-content: center;
  display: flex; /* Set display to flex to arrange stars horizontally */
}

.rating i {
  color: #fff;
  margin-right: 5px; /* Add margin between stars for spacing */
}

.rating i:hover,
.rating i.active {
  color: #ffd700; /* Set the color for selected stars, using gold color here */
}

  </style>
@endsection

@section('content-black')
  <div class="row">
    <div class="col s12">
      <div id="center-content" class="center-align">
        <h4>請為您的駕駛評分</h4>
        <form method="POST" class="col-sm" action="{{ route('submitRating') }}" >
          @csrf
          <div class="row">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
              <div class="rating">
                <i class="fas fa-star"  data-rating="1"></i>
                <i class="fas fa-star" data-rating="2"></i>
                <i class="fas fa-star" data-rating="3"></i>
                <i class="fas fa-star" data-rating="4"></i>
                <i class="fas fa-star" data-rating="5"></i>
              </div>
              <div id="selected-rating">
          <p>您的評分為: <span id="display-rating">0</span>/5分</p>
        </div>
              <!-- Hidden input to store the selected rating -->
              <input type="hidden" name="rating" id="rating" value="0">
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
      var stars = document.querySelectorAll('.rating i');
      var textarea = document.getElementById('textarea1');
      var characterCounter = document.getElementById('textarea1-counter');
      var ratingInput = document.getElementById('rating');
      var displayRating = document.getElementById('display-rating');

      stars.forEach(function (star) {
        star.addEventListener('click', function () {
          var rating = this.getAttribute('data-rating');
          ratingInput.value = rating;
          displayRating.innerText = rating; // Update displayed rating

          // Remove 'active' class from all stars
          stars.forEach(function (s) {
            s.classList.remove('active');
          });

          // Add 'active' class to clicked star and stars before it
          this.classList.add('active');
          var prevStars = Array.from(stars).slice(0, rating - 1);
          prevStars.forEach(function (s) {
            s.classList.add('active');
          });
        });
      });

      textarea.addEventListener('input', function () {
        var count = textarea.value.length;
        characterCounter.innerText = count + "/20";
        // Change color to white
        characterCounter.style.color = 'white';
      });
    });
  </script>
@endsection
