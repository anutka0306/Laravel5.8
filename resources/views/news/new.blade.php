@extends('layouts.main')

@section('title')
    @parent Главная
@endsection

@section('menu')
    @include('main_menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><small><b>Категория: </b>{{ $category_name}}</small></div>
                    <div class="card-body">
                        <h1>{{ $news['title'] }}</h1>
                        <img src="http://www.newsfiber.com/thumb/20200322-0DDA66BEB44922A4-0-1-5631490A-361A3CE16D200414.jpeg" style="float:left; padding:5px 20px 10px 0" alt="Alt text">
                        <p>{{ $news['text'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

