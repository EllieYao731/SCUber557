@extends('layouts.black')

@section('title', 'SCUber557_setting')

@section('style-black')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"/>
<link rel="stylesheet" href="{{ asset('css/style_select-driver.css') }}">
<style>
	.person-info{
		display: flex;
    border-radius: 5px;
    padding: 10px;
    align-items: center;
    margin: 10px 0;
	}
  .info-column{
    padding:10px;
    font-size:large;
  }
.row, .input-field{
	margin-bottom:0px;
}
.input-field input[type=text][disabled] + label,
.input-field input[type=password][disabled] + label {
  color: #9e9e9e;
}
.input-field input[type=text][disabled],
.input-field input[type=password][disabled] {
  border-bottom: 1px solid #9e9e9e;
}
</style>
@endsection

<!-- 返回的上一頁連結設定 -->
@section('back-link', '/home')

@section('content-black')

<h4 style="margin-top: unset;">帳號設定</h4>

<div class="grey darken-4" style="width:100%;display: flex;justify-content: center;">
  <div class="container">
    <div class="row">
      <div class="person-info">
        <div class="avatar-column">
          <img src="https://via.placeholder.com/100x100" alt="頭像">
        </div>
        <div class="info-column">
          <div class="name">王小明</div>
          <div class="">09010101</div>
        </div>
        <div class="action-column">
          <u><a href="{{url('/personal_info_update')}}" style="color: #9e9e9e;"><i class="fa-solid fa-pencil fa-xl"></i>編輯</a></u>
        </div>
      </div>

      <form class="col s12 grey darken-4">
          <div class="input-field col s12">
            <input disabled value="0900-000-000" id="phone_number" type="text" class="validate white-text">
            <label for="phone_number">手機號碼</label>
          </div>
          <div class="input-field col s12">
            <input disabled value="a@gmail.com" id="email" type="text" class="validate white-text">
            <label for="email">電子郵件</label>
          </div>
          <div class="input-field col s12">
            <input disabled value="password" id="password" type="password" class="validate white-text">
            <label for="password">密碼</label>
          </div>
          <div class="input-field col s12">
            <input disabled value="AAA-1111" id="license_plate" type="text" class="validate white-text">
            <label for="license_plate">車牌號碼</label>
          </div>
          <div class="input-field col s12">
            <input disabled value="白" id="color" type="text" class="validate white-text">
            <label for="color">顏色</label>
          </div>
          <div class="input-field col s12">
            <input disabled value="機車" id="car_model" type="text" class="validate white-text">
            <label for="car_model">車型</label>
          </div>
      </form>

    </div>
  </div>
</div>
<input type="button" class="button" value="登出" onclick="location.href='{{url('/')}}'">
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>

</script>
@endsection
