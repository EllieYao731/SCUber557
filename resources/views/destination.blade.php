@extends('layouts.black')

@section('title', 'SCUber557_black-test')

@section('style-black')
<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    />
<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    />
<style>
.container {
  display: flex;
  width: 80%;
  margin: 0 0 5% 0;
}
.container svg {
  display: block;
  width: 10%;
}
.input-group {
  width: 90%;
  display: flex;
  flex-direction: column;
  margin: 0 5% 0 5%;
  justify-content: space-between;
}
input,
p {
  font-size: large;
}
i {
  margin: 10px;
}
p {
  margin: 0px 0px 0px 0px;
}
input{
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
</style>
@endsection

@section('back-link', '/time-pick')

@section('content-black')

<div class="container" style='align-items: center;'>
	<svg width="10" height="70" viewBox="0 0 10 70" fill="none" xmlns="http://www.w3.org/2000/svg">
		<g filter="url(#filter0_d_717_1547)">
			<path
				d="M5 3V61"
				stroke="#DADADA"
				stroke-width="2"
				stroke-linecap="round"
				stroke-linejoin="round"
			/>
		</g>
		<rect y="58" width="10" height="10" fill="#C4C4C4" />
		<circle cx="5" cy="5" r="5" fill="#C4C4C4" />
		<defs>
			<filter
				id="filter0_d_717_1547"
				x="0"
				y="2"
				width="10"
				height="68"
				filterUnits="userSpaceOnUse"
				color-interpolation-filters="sRGB"
			>
				<feFlood flood-opacity="0" result="BackgroundImageFix" />
				<feColorMatrix
					in="SourceAlpha"
					type="matrix"
					values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
					result="hardAlpha"
				/>
				<feOffset dy="4" />
				<feGaussianBlur stdDeviation="2" />
				<feColorMatrix
					type="matrix"
					values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"
				/>
				<feBlend
					mode="normal"
					in2="BackgroundImageFix"
					result="effect1_dropShadow_717_1547"
				/>
				<feBlend
					mode="normal"
					in="SourceGraphic"
					in2="effect1_dropShadow_717_1547"
					result="shape"
				/>
			</filter>
		</defs>
	</svg>
	<div class="input-group">
		<input type="text" name="origin" placeholder="士林捷運站" />
		<input type="text" name="destination" placeholder="東吳大學" />
	</div>
</div>
<div class="container" style="display: flex; flex-direction: column">

	<button class="btn-transparent"><i class="fa-solid fa-magnifying-glass-plus"></i>Saved Places</button>
	<button class="btn-transparent"><i class="fa-solid fa-location-dot"></i>Set location on map</button>
</div>

<div class="container">
	<a class="waves-effect waves-light btn modal-trigger white black-text" href="#modal1">確定</a>

	<div
		id="modal1"
		class="modal bottom-sheet"
		style="height: 50%; background-color: black; left: 10%; width: 80%;"
	>
		<div class="modal-content">
			<h6>
				<i class="fa-solid fa-circle fa-xs" style="color: #ffffff"></i
				>若超時駕駛有棄單之權力
			</h6>
			<h6>
				<i class="fa-solid fa-circle fa-xs" style="color: #ffffff"></i
				>需準備乘客的安全帽
			</h6>
		</div>
		<div class="modal-footer btn-group" style="background-color: black; height:auto; display: flex;">
				<a href="" class="button modal-close waves-effect">返回</a>
				<a href="{{url('/home')}}" class="button">回到首頁</a>
		</div>
	</div>
</div>



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
