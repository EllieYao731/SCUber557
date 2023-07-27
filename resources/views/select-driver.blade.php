@extends('layouts.black')

@section('title', 'SCUber557_select-driver')

@section('style-black')
<link rel="stylesheet" href="{{ asset('css/style_select-driver.css') }}">
@endsection

@section('content-black')
<h1>請選擇駕駛</h1>
<div class="person">
  <div class="avatar-column">
    <img src="https://via.placeholder.com/60x60" alt="頭像" />
  </div>
  <div class="info-column">
    <div class="name-rating">
      <div class="name">王小明</div>
      <div class="rating">
        4.6
        <i class="fas fa-star"></i>
      </div>
    </div>
    <div class="origin">士林捷運站</div>
    <div class="destination">->東吳大學</div>
  </div>
  <div class="action-column">
    <div class="time">7/1 10:00</div>
    <button class="reserve-button">預約</button>
  </div>
</div>
<div class="person">
  <div class="avatar-column">
    <img src="https://via.placeholder.com/60x60" alt="頭像" />
  </div>
  <div class="info-column">
    <div class="name-rating">
      <div class="name">王小明</div>
      <div class="rating">
        4.6
        <i class="fas fa-star"></i>
      </div>
    </div>
    <div class="origin">士林捷運站</div>
    <div class="destination">->東吳大學</div>
  </div>
  <div class="action-column">
    <div class="time">7/1 10:00</div>
    <button class="reserve-button">預約</button>
  </div>
</div>
<div class="person">
  <div class="avatar-column">
    <img src="https://via.placeholder.com/60x60" alt="頭像" />
  </div>
  <div class="info-column">
    <div class="name-rating">
      <div class="name">王小明</div>
      <div class="rating">
        4.6
        <i class="fas fa-star"></i>
      </div>
    </div>
    <div class="origin">士林捷運站</div>
    <div class="destination">->東吳大學</div>
  </div>
  <div class="action-column">
    <div class="time">7/1 10:00</div>
    <button class="reserve-button">預約</button>
  </div>
</div>
<div class="person">
  <div class="avatar-column">
    <img src="https://via.placeholder.com/60x60" alt="頭像" />
  </div>
  <div class="info-column">
    <div class="name-rating">
      <div class="name">王小明</div>
      <div class="rating">
        4.6
        <i class="fas fa-star"></i>
      </div>
    </div>
    <div class="origin">士林捷運站</div>
    <div class="destination">->東吳大學</div>
  </div>
  <div class="action-column">
    <div class="time">7/1 10:00</div>
    <button class="reserve-button">預約</button>
  </div>
</div>

@endsection