@extends('layouts.black')

@section('title', 'SCUber557_signup')

@section('style-black')

<style>
#container {
    display: flex;
    flex-direction: column;
    align-items: center; /* 內容垂直居中 */
}

#container h3 {
    
    text-align: left; /* 將內容左對齊 */
}

#gender {
    margin-right: 110px;
    display: flex;
    align-items: center;
    justify-content: flex-start; /* 將內容水平左對齊 */
}


#gender h3 {
    margin-right: 10px; /* 元素之間的間距 */
}

#tel{
    margin-right: 30px;
}

#mail{
    margin-right: 30px;
}

#next {
  margin-top: 50px;
}

#next:hover {
    transform: scale(1.5); /* 將按鈕放大 20% */
}
</style>
@endsection

@section('back-link', '/')

@section('content-black')

<div id="container">
            <div id="title">
                <h2>請輸入您的基本資料</h2>
            </div>
            <div id="name">
                <h3>姓名： <input type="text"></h3>
            </div>
            <div id="gender">
                <h3>性別：</h3>
                <select name="gender_select">
                    <option>男</option>
                    <option>女</option>
                </select>
            </div>
            <div id = "tel">
                <h3>手機號碼：<input type="tel"></h3>
            </div>
            <div id="mail">
                <h3>電子郵件：<input type="email"></h3>
            </div>
            <div id="next">
                <a herf=""><input type="submit" value="下一步"></a>
            </div>
        </div>

@endsection