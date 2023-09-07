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
        
        <h3>調整過的圖片：</h3>
        <img src="{{ asset('storage/' . $adjustedImagePath) }}" alt="Adjusted Image" width="300">

        <h3>裁切過的圖片：</h3>
        <img src="{{ asset('storage/' . $croppedImagePath) }}" alt="Cropped Image" width="300">
        
        @isset($recognizedText)
            <h3>辨識結果：</h3>
            <p>原始圖片辨識結果：</p>
            <p>{{ $recognizedText }}</p>
            
            <p>調整過的圖片辨識結果：</p>
        @endisset
    @endisset
</div>
@endsection
