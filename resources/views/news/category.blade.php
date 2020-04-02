@extends('layouts.main')

@section('title')
    @parent Категория
@endsection

@section('menu')
    @include('main_menu')
@endsection

@section('content')
    <div class="content">
        <h1>Категория {{$category_name}}</h1>
        <div class="news-wrap">
            @foreach ($news as $item)
                <div class="news-item">
                    <a href="{{ route('news.show',[$item['id']]) }}"><h2>{{ $item['title'] }}</h2></a>
                    <a href="{{ route('news.show',[$item['id']]) }}">
                        <img src="http://www.newsfiber.com/thumb/20200322-0DDA66BEB44922A4-0-1-5631490A-361A3CE16D200414.jpeg" alt="New Image">
                    </a>
                    <div class="new-item__description">
                        {{ $item['text'] }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

