@extends('layouts.main')

@section('title')
    @parent Список категорий
@endsection

@section('menu')
    @include('main_menu')
@endsection

@section('content')
    <div class="content">
        <h1>CATEGORIES!</h1>
        <div class="news-wrap">
            @foreach ($categories as $item)

                <div class="news-item">
                    <a href="{{ route('news.category.show', $item['slug']) }}"><h2>{{ $item['name'] }}</h2></a>
                    <a href=" {{ route('news.category.show', $item['slug']) }}">
                        <img src="http://www.newsfiber.com/thumb/20200322-0DDA66BEB44922A4-0-1-5631490A-361A3CE16D200414.jpeg" alt="New Image">
                    </a>

                </div>
            @endforeach
        </div>
    </div>
@endsection
