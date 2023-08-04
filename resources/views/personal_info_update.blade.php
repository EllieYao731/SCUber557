@extends('layouts.black')

@section('title', 'SCUber557_personal_info_update')

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
.input-field input[type=text][disabled] + label {
  color: #9e9e9e;
}
.input-field input[type=text][disabled] {
  border-bottom: 1px solid #9e9e9e;
}
.center{
  display: flex;flex-direction: column;justify-content: center;align-items: center;
}
.c{
  width:100%;display: flex;justify-content: center;
}
</style>
@endsection

<!-- 返回的上一頁連結設定 -->
@section('back-link', '/setting')

@section('content-black')

<h4 style="margin-top: unset;">帳號資料變更</h4>
<form action="" class="center">
  <div class="grey darken-4 c">
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
        </div>

        <div class="col s12 grey darken-4">
          <div class="input-field col s12">
            <input value="0900000000" id="phone_number" type="text" class="validate white-text" required="required"  pattern="09\d{2}\-?\d{3}\-?\d{3}" maxlength="11">
            <label for="phone_number">手機號碼</label>
          </div>
          <div class="input-field col s12">
            <input value="a@gmail.com" id="email" type="text" class="validate white-text" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
            <label for="email">電子郵件</label>
          </div>
          <div class="input-field col s12">
            <input value="password" id="password" type="password" class="validate white-text">
            <label for="password">密碼</label>
          </div>
          <div class="input-field col s12">
            <input value="AAA-1111" id="license_plate" type="text" class="validate white-text">
            <label for="license_plate">車牌號碼</label>
          </div>
          <div class="input-field col s12">
            <input value="白" id="color" type="text" class="validate white-text">
            <label for="color">顏色</label>
          </div>
          <div class="input-field col s12">
            <input value="機車" id="car_model" type="text" class="validate white-text">
            <label for="car_model">車型</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <input type="sumit" class="button center" value="確認變更" onclick="location.href='{{url('/setting')}}'">
</form>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
  $(document).ready(function() {
    M.updateTextFields();
  });
</script>
@endsection
