@extends('layouts.black')

@section('title', 'SCUber557_question')

@section('style-black')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    .collapsible-body {
        background-color: #f5f5f5;
        text-align: left;
    }
		.collapsible-header{
			justify-content: space-between;
		}
		.collapsible-header i{
			margin-right:0;
		}
    .center {
        display: flex;
        justify-content: center;
    }
		.badge {
				background-color: #007bff;
				color: #fff;
				padding: 5px 10px;
				border-radius: 5px;
				margin-right: 10px;
		}
		.collapsible span.badge{
			float:left;
			color:white;

		}
</style>
@endsection

@section('content-black')
    <h4>常見問題</h4>
    <div class="center">
        <ul class="collapsible expandable black-text" style="width: 80%">
            <li>
                <div class="collapsible-header">
									<div>
										<span class="badge">帳號</span>
											我換機車了，要去哪更改資料?
									</div>
									<span class="material-icons">expand_more</span>
                </div>
                <div class="collapsible-body"><span>請至主頁的設定按鈕，可以查看修改帳號資料。</span></div>
            </li>
            <li>
                <div class="collapsible-header">
									<div>
										<span class="badge">帳號</span>
											無法更新個人資料?
									</div>
										<span class="material-icons">expand_more</span>
                </div>
                <div class="collapsible-body"><span>設定頁面的右上方有編輯按鈕。</span></div>
            </li>
            <li>
                <div class="collapsible-header">
									<div>
										<span class="badge">費用</span>
											支付方式有哪些？
									</div>
										<span class="material-icons">expand_more</span>
                </div>
                <div class="collapsible-body"><span>本平台尚未與其他金錢交易平台合作，僅接受現金交易或交由使用者約定。</span></div>
            </li>
        </ul>
    </div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var collapsibles = document.querySelectorAll('.collapsible');
        M.Collapsible.init(collapsibles);
    });
</script>
@endsection
