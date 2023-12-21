@extends('layouts.black')

@section('title', 'SCUber577_test')

@section('style-black')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<style>
#center-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh; /* Set the height to the full viewport height */
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

/* 更具體的選擇器，以確保樣式的優先順序 */
.file-field .file-path-wrapper .file-path.validate.white-text {
    color: white !important;
}



</style>
@endsection

@section('content-black')
<div id="center-content" class="center-align">
    <h4>上傳圖片並辨識文字</h4>

    <form action="{{ route('uploadAndRecognize') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="file-field input-field">
            <div class="btn">
                <span>選擇圖片</span>
                <input type="file" name="image">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate white-text" type="text"> <!-- Add white-text class -->
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit">上傳並辨識</button>
    </form>

    @isset($imagePath)
        <!-- <h5>上傳的圖片：</h5> -->
        <!-- <img class="responsive-img" src="{{ asset('storage/' . $imagePath) }}" alt="Uploaded Image"> -->
        @isset($cropImageContents)
            <h5>處理後的圖片：</h5>
            <img class="responsive-img" src="data:image/jpeg;base64,{{ base64_encode($cropImageContents) }}" alt="Processed Image">
        @endisset

        @isset($recognizedText)
            <h5>辨識結果：</h5>
            <p>{{ $recognizedText }}</p>
        @endisset
    @endisset
</div>
@endsection
