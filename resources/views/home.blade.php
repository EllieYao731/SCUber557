@extends('layouts.layout')

@section('title', 'SCUber557_home')

@section('style')
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
	rel="stylesheet"
	integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
	crossorigin="anonymous"
/>
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
	crossorigin="anonymous"
></script>
<link rel="stylesheet" href="{{ asset('css/style_home.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
/>
@endsection

@include('layouts.nav')
@section('content')

<div class="container-fluid container-al">
	<div id="greyDiv">
		<div class="row icon-row">
			<div class="icon-button col-md-3">
				<form method="post" action="{{ route('redirect.to.go-or-leave') }}">
						@csrf
						<input type="hidden" name="button_clicked" value="choose_driver">
						<button class="icon-button" type="submit"><i class="fas fa-motorcycle"></i></button>
					</form>
				<span class="icon-label text">駕駛</span>
			</div>
			<div class="icon-button col-md-3">
				<form method="post" action="{{ route('redirect.to.go-or-leave') }}">
						@csrf
						<input type="hidden" name="button_clicked" value="choose_passenger">
						<button class="icon-button" type="submit"><i class="fas fa-user"></i></button>
					</form>
				<span class="icon-label text">乘客</span>
			</div>
			<div class="icon-button col-md-3">
				<form method="post" action="{{ route('setting') }}">
						@csrf
						<input type="hidden" name="button_clicked" value="a">
						<button class="icon-button" type="submit"><i class="fas fa-comments"></i></button>
					</form>
				<span class="icon-label text">聊天室</span>
			</div>
			<div class="icon-button col-md-3">
				<form method="post" action="{{ route('setting') }}">
						@csrf
						<input type="hidden" name="button_clicked" value="a">
						<button  class="icon-button" type="submit"><i class="fas fa-cog"></i></button>
					</form>
				<span class="icon-label text">設定</span>
			</div>
			<!-- <div class="icon-button col-md-3">
				<a href="{{url('/go-or-leave')}}">
					<div class="icon-background"></div>
					<i class="fas fa-user"></i>
				</a>
				<form method="post" action="{{ route('redirect.to.go-or-leave') }}">
						@csrf
						<input type="hidden" name="button_clicked" value="b">
						<button type="submit"></button>
				</form>
				<span class="icon-label text">乘客</span>
			</div>
			<div class="icon-button col-md-3">
				<a href="{{url('/no_message')}}">
					<div class="icon-background"></div>
					<i class="fas fa-comments"></i>
				</a>
				<span class="icon-label text">聊天室</span>
			</div>
			<div class="icon-button col-md-3">
				<a href="{{url('/setting')}}">
					<div class="icon-background"></div>
					<i class="fas fa-cog"></i>
				</a>
				<span class="icon-label text">設定</span>
			</div> -->
		</div>
	</div>
	<div id="blackDiv">
		<div class="message">
			<span class="text" style="font-size: 18px">即將到來的預約...</span>
		</div>
		@isset($pairInfo)
        <div class="Pairs-successfully">
            <div class="person-info">
                <img style="width: 60px; height: 60px; border-radius: 9999px" src="https://via.placeholder.com/60x60" />
                <div class="person-details">
                    <span class="person-name">{{ $pairInfo['name'] }}</span>
                    <span class="person-location">{{ $pairInfo['location'] }}</span>
                    <span class="person-destination">{{ $pairInfo['destination'] }}</span>
                </div>

                <div class="person-schedule">
                    <span class="schedule-time">{{ $pairInfo['time'] }}</span>
                    <button type="button" class="btn btn-outline-light">詳情</button>
                </div>
            </div>
        </div>
    @else
        <p class="text" style="font-size: 24px;margin_top: 10px;">{{ $message ?? "暫無配對" }}</p>
    @endisset
	</div>
</div>


@endsection
