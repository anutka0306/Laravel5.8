@extends('layouts.main')

@section('title')
    @parent Категория
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <h3>Категория {{$category_name}}</h3>
                        <div class="row">
                            @foreach ($news as $item)
                                <div class="col-md-4">
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
                </div>
            </div>
        </div>
    </div>

@endsection

