@extends('layouts.main')

@section('title')
    @parent Новости
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <h1>NEWS!</h1>
                        <div class="row">
                            @foreach ($news as $item)
                                <div class="col-md-4">
                                    <a href="{{ route('news.show',$item) }}"><h4>{{ $item->title }}</h4></a>
                                    <a href="{{ route('news.show',$item) }}">
                                        <div class="catalog-item__image" style="background-image:url({{ $item->image??asset('storage/default.jpg') }})" alt="New Image"></div>
                                    </a>
                                    <div class="new-item__description">
                                        {!! $item->text !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{ $news->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


