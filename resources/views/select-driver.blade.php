@extends('layouts.black')

@section('title', 'SCUber557_select-driver')

@section('style-black')
<link rel="stylesheet" href="{{ asset('css/style_select-driver.css') }}">
@endsection

@section('content-black')
<h1>請選擇駕駛</h1>


@include('layouts.driver-info',
['driver_img'=>'https://via.placeholder.com/60x60','driver_name'=>'王小明','driver_rating'=>'4.6',
'driver_origin'=>'士林捷運站','driver_destination'=>'東吳大學','driver_time'=>'7/1 10:00'])

@include('layouts.driver-info',
['driver_img'=>'','driver_name'=>'','driver_rating'=>'',
'driver_origin'=>'','driver_destination'=>'','driver_time'=>''])

@endsection
