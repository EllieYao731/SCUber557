@extends('layouts.black')

@section('title', 'SCUber557_select-driver')

@section('style-black')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"/>
<link rel="stylesheet" href="{{ asset('css/style_select-driver.css') }}">
@endsection

@section('content-black')
<h4>請選擇駕駛</h4>


@include('layouts.driver-info',
['driver_img'=>'https://via.placeholder.com/100x100','driver_name'=>'王小明','driver_rating'=>'4.6',
'driver_origin'=>'士林捷運站','driver_destination'=>'東吳大學','driver_time'=>'7/1 10:00'])

@include('layouts.driver-info',
['driver_img'=>'','driver_name'=>'','driver_rating'=>'',
'driver_origin'=>'','driver_destination'=>'','driver_time'=>''])


<div class="container">
	<div
		id="modal1"
		class="modal bottom-sheet"
		style="height: 50%; background-color: black; left: 10%; width: 80%;"
	>
		<div class="modal-content">
			<h6>
				<i class="fa-solid fa-circle fa-xs" style="color: #ffffff;margin: 10px;"></i
				>若超時駕駛有棄單之權力
			</h6>
		</div>
		<form method="post" action="{{ route('redirect.to.home') }}">
			@csrf
			<div class="modal-footer btn-group" style="background-color: black; height:auto; display: flex;">
					<input type="button" class="button modal-close" value='取消'></input>
					<input type="hidden" name="pair_success" value="False">
					<button class="button" type="submit">確認送出</button>
			</div>
		</form>
	</div>
</div>

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

@endsection
