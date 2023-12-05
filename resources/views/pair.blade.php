@extends('layouts.black')

@section('title', 'SCUber557_select-driver')

@section('style-black')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"/>
<link rel="stylesheet" href="{{ asset('css/style_select-driver.css') }}">
<style>
	.person{
		background-color: #1a1a1a;
		flex-direction: column;
		/* margin: 50px 0px 50px 0px;
    width: 100%; */
	}
	.action-column {
    flex: 2;
    text-align: center;
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
}
.per{
	display: flex;align-items: center;
}
.info{
	display: flex;flex-direction: column;
}
.road{
	display: flex;
	font-size: 18px;
}
.name {
    font-size: 24px;
}
.rating{
	font-size: 18px;
}
.invite{
	margin: 30px 0px 30px 0px;
}
.avatar-column{
	padding-right:20px;
}
</style>
@endsection

@section('content-black')
<h5>您收到了共乘邀請！</h5>

<div class="invite">

<form method="post" action="{{ route('matchform') }}">
	@csrf
	<div class="person">
		<div class="per">
			<div class="avatar-column">
				<img src="https://via.placeholder.com/100x100" alt="頭像" />
			</div>
			<div class="info">
				<div class="name">王小名</div>
				<div class="rating"><i class="fas fa-star" style="padding-right:10px;"></i>4.6 / 5</div>
			</div>
		</div>
	</div>
</div>
  <div class="action-column">
		<button class="waves-effect waves-light btn modal-trigger white black-text reserve-button" type="submit" name="match_form_action" value="reject">拒絕</button>
		<button class="waves-effect waves-light btn modal-trigger white black-text reserve-button" type="submit" name="match_form_action" value="agree">同意</button>
  </div>
</form>


@endsection
