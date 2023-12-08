@extends('layouts.layout')

@section('content')
<div class="container">
    <h2>上傳圖片並辨識文字</h2>

    <form action="{{ route('uploadAndRecognize') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button type="submit">上傳並辨識</button>
    </form>

    @isset($imagePath)
        <h3>上傳的圖片：</h3>
        <img src="{{ asset('storage/' . $imagePath) }}" alt="Uploaded Image" width="300">
        <img src="{{ asset('storage/' . $absoluteImagePath) }}" alt="Uploaded Image" width="300">
        <img src="{{ asset('storage/' . $outputImagePath) }}" alt="Uploaded Image" width="300">
        @isset($recognizedText)
            <h3>辨識結果：</h3>
            <p>{{ $recognizedText }}</p>
            <p>{{ $adrecognizedText }}</p>
            @isset($croppedText)
                <p>{{ $croppedText }}</p>
            @endisset
        @endisset
    @endisset
</div>
@endsection
