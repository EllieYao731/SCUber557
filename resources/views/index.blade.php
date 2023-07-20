<!-- 繼承模板 -->
@extends('layouts.layout')

@section('title', 'SCUber577')

<!-- @section('sidebar')
    @parent

    <p>這邊會附加在主要的側邊欄。</p>
@endsection -->

@section('content')
    <h1>註冊</h1>
    <form action="\sign-up" method="post">
        @csrf
        <input type="text" name="StudentID"><br>
        <input type="text" name="name"><br>
        <input type="radio" name="gender" value="man">男
        <input type="radio" name="gender" value="women">女
        <input type="submit" name="submit" value="提交">
    </form>
@endsection
