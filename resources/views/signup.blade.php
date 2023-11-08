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

#gender ,#riderFlag{
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
<script type="text/javascript">
    function save_to_cookie(){
        let studentID = document.getElementById("studentID").value;
        let password = document.getElementById("password").value;

        document.cookie ="studentID="+studentID+";password="+password;
    }
</script>
<div id="container">
            <form action="/api/user/register" method="post">
                <div id="title">
                    <h3>請輸入您的學號、密碼</h3>
                </div>
                <div id="number">
                    <h3>學號： <input id="studentID" name="studentID" placeholder="請輸入學號"></h3>
                </div>
                <div id="password">
                    <h3>密碼：<input id="password" name="password" type="password"></h3>
                </div>
                <div id="title">
                    <h2>請輸入您的基本資料</h2>
                </div>
                <div id="name">
                    <h3>姓名： <input type="text" name="name"></h3>
                </div>
                <div id="gender">
                    <h3>性別：</h3>
                    <select name="gender">
                        <option value="male">男</option>
                        <option value="female">女</option>
                    </select>
                </div>
                <div id="riderFlag">
                    <h3>是否為騎士：</h3>
                    <select name="riderFlag">
                        <option value="1">是</option>
                        <option value="0">否</option>
                    </select>
                </div>
                <div id = "mobile">
                    <h3>手機號碼：<input type="mobile" name="mobile"></h3>
                </div>
                <div id="email">
                    <h3>電子郵件：<input type="email" name="email"></h3>
                </div>

                <button type="submit" value="註冊" style="width:5em;height:2em">註冊</button>

            </form>
            <!-- <div id="next">
                <a href="{{ url('/information') }}"><input type="submit" value="下一步" ></a>
            </div> -->
        </div>
        <!-- @if($errors->count())
            @foreach ($errors->all() as $error)
                <div class="alert">
                    <b>{{$errors}}</b>
                </div>
            @endforeach
        @endif -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- @if (session('errors'))
            <div class="alert">{{ session('errors') }}</div>
        @endif -->
    </body>

@endsection
