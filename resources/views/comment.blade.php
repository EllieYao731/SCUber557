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

    .rating {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    .rating input {
      display: none;
    }

    .rating label {
      cursor: pointer;
      width: 40px;
      height: 40px;
      font-size: 2rem;
      display: inline-block;
      position: relative;
      top: 5px;
    }

    .rating label::before {
    content: '\2605'; /* Unicode 實心星星 */
    font-size: 1.5rem; /* 調整字體大小 */
    line-height: 40px;
    display: block;
    text-align: center;
    color: #333;
  }

    .rating label::after {
      content: ''; /* Unicode 實心星星 */
      font-size: 2rem;
      line-height: 40px; /* 調整行高以垂直置中 */
      display: block;
      text-align: center; /* 文字置中 */
    }

    .rating input:checked ~ label::before {
      color: #FFD700; /* Highlight color, adjust as needed */
    }

    #textarea1-counter {
      color: white !important;
    }

    #current-rating {
    font-size: 1.5rem; /* 調整字體大小 */
  }
  </style>
@endsection

@section('content-black')
  <div class="row">
    <div class="col s12">
      <div id="center-content" class="center-align">
        <h4>請為您的駕駛評分</h4>
        <form id="feedback-form" class="col-sm" action="{{ url('/submit-feedback') }}" method="POST">
          @csrf
          <div id="test-stars" class="row">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
              <div class="rating">
                <input type="radio" name="star" id="star1" value="1" />
                <label for="star1"></label>
                <input type="radio" name="star" id="star2" value="2" />
                <label for="star2"></label>
                <input type="radio" name="star" id="star3" value="3" />
                <label for="star3"></label>
                <input type="radio" name="star" id="star4" value="4" />
                <label for="star4"></label>
                <input type="radio" name="star" id="star5" value="5" />
                <label for="star5"></label>
              </div>
              <input type="hidden" name="rating" id="hidden-rating" value="0">
              <div id="current-rating">評分：0</div>
              <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="textarea1" name="comment" class="materialize-textarea" maxlength="20"></textarea>
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
      var ratingStars = document.querySelectorAll('.rating input');
      var currentRating = document.getElementById('current-rating');
      var hiddenRatingInput = document.getElementById('hidden-rating');
      
      ratingStars.forEach(function(star, index) {
        star.addEventListener('click', function() {
          var clickedIndex = index + 1;
          setRating(clickedIndex);
          highlightStars(clickedIndex);
        });
      });

      function setRating(value) {
        // 反转评分逻辑
        var reversedRating = 6 - value;
        hiddenRatingInput.value = reversedRating;
        currentRating.innerText = '評分：' + reversedRating;
      }

      function highlightStars(count) {
        ratingStars.forEach(function(star, index) {
          if (index < count) {
            star.parentElement.classList.add('selected');
          } else {
            star.parentElement.classList.remove('selected');
          }
        });
      }

      var textarea = document.getElementById('textarea1');
      var characterCounter = document.getElementById('textarea1-counter');

      textarea.addEventListener('input', function () {
        var count = textarea.value.length;
        characterCounter.innerText = count + "/20";
        characterCounter.style.color = 'white';
      });

      // 获取表单元素
      var feedbackForm = document.getElementById('feedback-form');

      // 添加 'submit' 事件监听器
      feedbackForm.addEventListener('submit', function (event) {
        // 阻止表单默认提交行为
        event.preventDefault();

        // 表单成功提交后，执行重定向到 Home 页面
        window.location.href = '{{ url("/home") }}';
      });
    });
  </script>
@endsection
