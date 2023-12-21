<!-- resources/views/test.blade.php -->

@extends('layouts.black')

@section('title', 'SCUber577_test')

@section('style-black')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <style>
        #center-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 80vh;
        }

        .container h4,
        .container h5,
        .container p {
            text-align: center;
        }

        .container img {
            display: block;
            margin: 0 auto;
        }

        .file-field .file-path-wrapper .file-path.validate.white-text {
            color: white !important;
        }

        .loading-spinner {
            display: none;
            text-align: center;
            margin-top: 20px;
        }

        .loading-text {
            font-size:20px;
            color: white;
            margin-top: 10px;
        }
    </style>
@endsection

@section('content-black')
    <div id="center-content" class="center-align">
        <h4>上傳圖片並辨識文字</h4>

        <form id="uploadForm" action="{{ route('uploadAndRecognize') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="file-field input-field">
                <div class="btn">
                    <span>選擇圖片</span>
                    <input type="file" name="image">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate white-text" type="text">
                </div>
            </div>
            <button id="submitBtn" class="btn waves-effect waves-light" type="submit">上傳並辨識</button>
        </form>

        <div id="loadingSpinner" class="loading-spinner">
            <div class="preloader-wrapper small active">
                <div class="spinner-layer spinner-green-only">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <div class="loading-text" id="loadingText">辨識中，請稍候...</div>
        </div>

        @if(session('error'))
            <script>
                alert('{{ session('error') }}');
            </script>
        @endif

        @isset($numericResults)
            <!-- Display recognition result -->
            <h5>辨識結果：</h5>
            <p id="recognitionResult">{{ $numericResults }}</p>

            @if(session('error'))
            <script>
                alert('{{ session('error') }}');
            </script>
            @endif
            <!-- Check if the recognized text is an eight-digit number -->
            @if (preg_match('/^\d{8}$/', $numericResults))
                <script>
                    // Display message and redirect after recognition
                    document.getElementById('loadingText').innerText = '辨識成功，將為您跳轉至登入頁面';
                    document.getElementById('loadingSpinner').style.display = 'block'; // Show loading spinner
                    setTimeout(function() {
                        window.location.href = '/custom-login';
                    }, 3000);
                </script>
            @endif
        @endisset

        @isset($imagePath)
            @isset($cropImageContents)
                <h5>處理後的圖片：</h5>
                <img class="responsive-img" src="data:image/jpeg;base64,{{ base64_encode($cropImageContents) }}" alt="Processed Image">
            @endisset
        @endisset
    </div>

    <script>
        document.getElementById('submitBtn').addEventListener('click', function () {
            // Show loading spinner and text when button is clicked
            document.getElementById('loadingSpinner').style.display = 'block';
        });
    </script>
@endsection
