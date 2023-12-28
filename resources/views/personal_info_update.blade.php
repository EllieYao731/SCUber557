@extends('layouts.black')

@section('title', 'SCUber557_personal_info_update')

@section('style-black')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"/>
<link rel="stylesheet" href="{{ asset('css/style_select-driver.css') }}">
<script type="text/javascript">
  function getCookie(name) {
      var value = `; ${document.cookie}`;
      var parts = value.split(`; ${name}=`);
      if (parts.length === 2) return parts.pop().split(';').shift();
    }

    var studentID = getCookie('studentID');

    if (!studentID){
      alert("請重新登入");
      window.location.href = "/login";
    }
</script>
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
<form method="post" action="api/user" class="center">
     {{ csrf_field() }}
    @method('PATCH')
  <div class="grey darken-4 c">
    <div class="container">
      <div class="row">

        <div class="person-info">
          <div class="avatar-column">
            <img src="https://via.placeholder.com/100x100" alt="頭像">
          </div>
          <div class="info-column">
            <div id="name"></div>
            <div id="studentID"></div>
          </div>
        </div>

        <input id="studentIDSubmit" type="hidden" name="studentID" value>

        <div class="col s12 grey darken-4">
          <div class="input-field col s12">
            <input value="." id="mobile" type="text" class="validate white-text" required="required"  pattern="09\d{2}\-?\d{3}\-?\d{3}" maxlength="11" name="mobile">
            <label for="phone_number">手機號碼</label>
          </div>
          <div class="input-field col s12">
            <input value="." id="email" type="text" class="validate white-text" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email">
            <label for="email">電子郵件</label>
          </div>
          <!-- <div class="input-field col s12">
            <input value="password" id="password" type="password" class="validate white-text">
            <label for="password">密碼</label>
          </div> -->
          <!-- <div class="input-field col s12">
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
          </div> -->
        </div>
      </div>
    </div>
  </div>
  <button class="button center" value="確認變更" type="submit">確認變更</button>
</form>
@endsection

@section('script')
<script type="text/javascript">
  function getCookie(name) {
    var value = `; ${document.cookie}`;
    var parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
  }

  var studentID = getCookie('studentID');

  // console.log(studentID);

  async function fetchData(studentID) {
    var requestOptions = {
      method: 'GET',
      redirect: 'follow'
    };
    try {
      const response = await fetch("http://127.0.0.1:8000/api/user?studentID=" + studentID, requestOptions);

      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      console.log('hello')
      const data = await response.json();

      document.getElementById("name").innerText = data.name
      document.getElementById("studentID").innerText = data.studentID
      document.querySelectorAll("input#studentIDSubmit")[0].value = data.studentID
      document.querySelectorAll('input#mobile')[0].value = data.mobile
      document.querySelectorAll('input#email')[0].value = data.email


        // 在这里使用获取的数据
      console.log(data);

      return JSON.stringify(data);
    }catch (error) {
      console.error("Fetch error:", error);
      throw error;
    }
  }

  const result = fetchData(studentID);
  // console.log(result);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
  $(document).ready(function() {
    M.updateTextFields();
  });
</script>
@endsection
