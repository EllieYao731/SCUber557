@extends('layouts.black')

@section('title', 'SCUber557_black-test')

@section('style-black')
<link rel="stylesheet" href="{{ asset('css/style_chat.css') }}">
@endsection

@section('back-link', '/home')

@section('content-black')
<div class="chat_container">
	<div class="chat_box">
		<div id="chatRoom" class="chat_message">
		</div>

		<div class="chat_input">
			<div class="myIcon iconTag">
			<i class="fa-regular fa-face-smile ipt_icon"></i>
				<div class="icon_block">
					<div class="emoji_icon"><img src="{{ asset('image/emoji/like.png') }}" alt=""></div>
					<div class="emoji_icon"><img src="{{ asset('image/emoji/hi.png') }}" alt=""></div>
					<div class="emoji_icon"><img src="{{ asset('image/emoji/love.png') }}" alt=""></div>
					<div class="emoji_icon"><img src="{{ asset('image/emoji/happy.png') }}" alt=""></div>
					<div class="emoji_icon"><img src="{{ asset('image/emoji/confused.png') }}" alt=""></div>
					<div class="emoji_icon"><img src="{{ asset('image/emoji/boring.png') }}" alt=""></div>
					<div class="emoji_icon"><img src="{{ asset('image/emoji/tired.png') }}" alt=""></div>
					<div class="emoji_icon"><img src="{{ asset('image/emoji/sleep.png') }}" alt=""></div>
					<div class="emoji_icon"><img src="{{ asset('image/emoji/no.png') }}" alt=""></div>
					<div class="emoji_icon"><img src="{{ asset('image/emoji/angry.png') }}" alt=""></div>
					<div class="emoji_icon"><img src="{{ asset('image/emoji/shocked.png') }}" alt=""></div>
				</div>
			</div>
			<div class="myIcon">
				<label for="file-input" class="custom-file-input">
					<i class="fa-solid fa-plus ipt_icon"></i>
				</label>
				<input id="file-input" type="file" style="display: none;">
			</div>
			<input class="sendMsg" type="text" placeholder="請輸入訊息" />
			<div class="myIcon">
				<i class="fa fa-share send_icon"></i>
			</div>
		</div>

	</div>
</div>
@endsection

@section('footer-black')
@section('script')
<script src="{{ asset('js/webChat.js')}}"></script>
<script>
// 取得相關元素
const iconTag = document.querySelector('.iconTag');
const iconBlock = document.querySelector('.icon_block');

// 初始隱藏貼圖區
iconBlock.style.display = 'none';

// 監聽點擊事件
iconTag.addEventListener('click', function() {
  // 判斷貼圖區的顯示狀態，進行切換
  if (iconBlock.style.display === 'none') {
    iconBlock.style.display = 'flex';
  } else {
    iconBlock.style.display = 'none';
  }
});
</script>
@endsection
