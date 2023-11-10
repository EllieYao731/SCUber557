@extends('layouts.black')

@section('title', 'SCUber577_forget')

@section('style-black')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<style>
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 80%;
    margin: 0 auto 5% auto;
}

#modal1 {
    height: auto; /* 設定為 auto，使模態框的高度能夠根據內容自動調整 */
    background-color: black;
    margin-left: 10%;
    width: 100%;
    bottom: 0;
    top: auto;
    transform: translateY(100%);
}

#modal1.modal-bottom-sheet {
    position: fixed;
    top: auto;
    bottom: 0;
    transform: translateY(0);
}


.container svg {
    display: block;
    width: 10%;
}

#center-content {
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

#center-content h4 {
    color: white;
    margin: 0;
    white-space: nowrap;
}

.input-group {
    width: 90%;
    display: flex;
    flex-direction: column;
    margin: 0 5% 0 5%;
    justify-content: space-between;
}

input {
    color: white;
}

.button {
    background-color: black;
    color: #fff;
    border: 2px solid #fff;
    padding: 10px 0px;
    font-size: 15px;
    margin: 18px 0;
    text-align: center;
    width: 80%;
}

.button:hover {
    background-color: #fff;
    color: #1a1a1a;
}

.btn-group {
    display: flex;
    padding: 2%;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}

.btn-transparent {
    border: none;
    background-color: transparent;
    color: white;
    text-align: left;
    font-size: large;
}

@keyframes scu {
    0%, 100% {
        text-shadow: 0 0 20px #fff, 0 0 100px #fff, 0 0 20px #fff;
        color: initial; /* 重置顏色 */
    }
    50% {
        text-shadow: 0 0 10px red, 0 0 20px red, 0 0 10px red;
        color: red !important;
    }
}

#scu {
    color: aliceblue;
    padding: 10px;
    animation: scu 1.5s ease-in-out infinite alternate;
    margin-top: 100px;
}

footer {
    position: absolute;
    bottom: 50px; /* 調整 bottom 的值來上移 */
    width: 100%;
    text-align: center;
    height: 30px;
    padding-top: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
@endsection

@section('content')
@section('back-link', '/')

@section('content-black')

<div class="row">
    <div class="col s12">
        <div id="center-content">
            <h4>請輸入您的學號</h4>
            <div class="row">
                <div class="col s12">
                    <form class="col-sm">
                        <!-- 表單內容 -->
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="number" type="text" class="validate">
                                <label for="number">學號</label>
                            </div>
                        </div>
                    </form>
                    <div class="container">
                        <div class="container" style="text-align: center;">
                            <a class="waves-effect waves-light btn modal-trigger white black-text" href="#modal1">確定</a>
                            <div id="modal1"
                                class="modal bottom-sheet"
                                style="height: 50%; background-color: black; margin-left: 10%; width: 100%;">
                                <div class="modal-content">
                                    <h5>密碼已發送到您的信箱</h5>
                                </div>
                                <div class="modal-footer btn-group"
                                    style="background-color: black; height:auto; display: flex;">
                                    <a href="" class="button modal-close waves-effect">再次寄出</a>
                                    <a href="{{url('/login')}}" class="button">回到登入頁面</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <div id="scu">
        <h4>SCUber<i>577</i></h4>
    </div>
</footer>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, {
            endingTop: '100%',
            startingTop: '100%',
        });
    });
</script>
@endsection
