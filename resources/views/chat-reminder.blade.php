@extends('layouts.black')

@section('title', 'SCUber557_select-driver')

@section('style-black')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"/>
<link rel="stylesheet" href="{{ asset('css/style_select-driver.css') }}">
<style>
.center{
	display: flex;
	justify-content: center;
}
.center-btn{
	gap: 10px;
	flex-direction: column;
}
.gap{
	margin: 20px 0px 30px 0px;
}
</style>
@endsection

@section('content-black')


<h4>配對成功!</h4>
<div class="center gap">
<h6>* 聊天室已開啟</h6>
</div>
<form method="post" action="{{ route('chat-reminder') }}">
@csrf
<div class="center" style="	gap: 20px; display: grid;">

		<button class="waves-effect waves-light btn modal-trigger white black-text reserve-button" type="submit" name="button_form" value="to_chatroom">前往聊天室</button>
		<button class="waves-effect waves-light btn modal-trigger white black-text reserve-button" type="submit" name="button_form" value="to_home">先回主頁</button>

</div>
</form>
@endsection
