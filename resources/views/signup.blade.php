@extends('layouts.black')

@section('title', 'SCUber557_signup')

@section('style-black')

<style>
    #container {
  display: flex;
  flex-direction: column; /* 將內容在垂直方向上排列 */
  align-items: center; /* 在水平方向置中 */
  position: relative; /* 將定位方式設為相對定位 */
}

#title {
  font-size: 20px;
  margin-bottom: 20px;
}

#number {
  margin-bottom: 10px;
}

#password {
  margin-bottom: 10px;
}

#next {
  margin-top: 50px;
}

#next:hover {
    transform: scale(2); /* 將按鈕放大 20% */
}

</style>
@endsection

@section('back-link', '/')

@section('content-black')
<div id="container">
            <div id="title">
                <h3>請輸入您的學號、密碼</h3>
            </div>
            <div id="number">
                <h3>學號： <input placeholder="請輸入學號"></h3>
            </div>
            <div id="password">
                <h3>密碼：<input type="password"></h3>
            </div>
            <div id="next">
                <a herf="{{ url('/information') }}"><input type="submit" value="下一步"></a>
            </div>
        </div>
    </body>

@endsection
