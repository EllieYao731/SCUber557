@extends('layouts.black')

@section('title', 'SCUber557_setting')

@section('style-black')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"/>
<link rel="stylesheet" href="{{ asset('css/style_select-driver.css') }}">
@endsection


@section('content-black')

<h4>請選擇駕駛</h4>

@foreach($drivers as $driver)
			@include('layouts.driver-info', [
					'driver_img' => 'https://via.placeholder.com/100x100',
					'driver_id' => $driver['id'],
					'driver_name' => $driver['name'],
					'driver_rating' => $driver['rating'],
					'driver_origin' => $driver['location'],
					'driver_destination' => $driver['destination'],
					'driver_time' => $driver['time'],
			])
	@endforeach
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
					<!-- Add a hidden input field to store the selected driver's ID -->
					<input type="hidden" id="selectedDriverId" name="selectedDriverId" value="">
					<button class="button" type="submit">確認送出</button>
			</div>
		</form>
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

      document.querySelectorAll('.reserve-button').forEach(function(button) {
        button.addEventListener('click', function() {
          var driverId = this.getAttribute('data-driver-id');
          document.querySelector('#selectedDriverId').value = driverId;
        });
      });
    });
</script>
@endsection
