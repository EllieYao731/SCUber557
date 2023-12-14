@extends('layouts.black')

@section('title', 'SCUber557_reset_password')

@section('style-black')

<style>
#container {
  display: flex;
  flex-direction: column; /* 將內容在垂直方向上排列 */
  align-items: center; /* 在水平方向置中 */
  position: relative; /* 將定位方式設為相對定位 */
}
</style>
@endsection

@section('back-link', '/')

@section('content-black')
    <div class="container">
        <h1>忘記密碼</h1>
        <form id="reset-password">
            <h4>請輸入您的電子信箱：<input id="email" type="text" name="email"></input></h4> 
        </form>
    </div>
@endsection
