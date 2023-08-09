@extends('layouts.layout')

@section('style')

@yield('style-black')
<!-- icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>

<style>
	body {
		background-color: #1a1a1a;
		margin: 0;
		padding: 0;
		font-family: Arial, sans-serif;
		color: #fff;
	}
	main {
		display: flex;
		padding: 2%;
		justify-content: center;
		flex-direction: column;
		align-items: center;
	}
	.container {
		display: flex;
		width: 80%;
		margin: 0 0 5% 0;
	}
	h1,h2,h3,h4,h5,h6 {
		text-align: center;
		color: #fff;
	}
	.back-button {
    height: 5vh;
    background-color: #1a1a1a;
    padding: 10px;
    margin-left: 4%;
    margin-top: 2vh;
	}

	.back-button a {
		text-decoration: none;
		color: #fff;
		font-size: 18px;
	}

	.button {
		background-color: black;
		color: #fff;
		border: 2px solid #fff;
		font-size: 15px;
		margin: 18px 0;
		text-align: center;
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
</style>
@endsection

@section('content')
<div class="back-button">
	<a href="@yield('back-link')"><i class="fas fa-chevron-left"></i></a>
</div>
@yield('content-black')

@yield('footer')
@yield('script')
@endsection
