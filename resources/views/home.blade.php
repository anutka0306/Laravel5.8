@extends('layouts.main')

@section('title')
   @parent Главная
@endsection

@section('menu')
    @include('main_menu')
@endsection

@section('content')
<h1>Hello, people!</h1>
@endsection


