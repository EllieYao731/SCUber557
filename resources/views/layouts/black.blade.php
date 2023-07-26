@extends('layouts.layout')

@section('style')

@yield('style-black')
<link
	rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
/>
<style>
	body {
		background-color: #1a1a1a;
		margin: 0;
		padding: 0;
		font-family: Arial, sans-serif;
		color: #fff;
	}

	h1 {
		text-align: center;
		color: #fff;
		font-size: 24px;
	}
	.back-button {
		background-color: #1a1a1a;
		padding: 10px;
		margin-left: 4%;
		margin-top: 4%;
	}

	.back-button a {
		text-decoration: none;
		color: #fff;
		font-size: 18px;
	}

	main {
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
	<a href="#"><i class="fas fa-chevron-left"></i></a>
</div>
<main>@yield('content-black')</main>
@endsection
