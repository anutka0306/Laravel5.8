@extends('layouts.admin')

@section('title')
    @parent Админка
@endsection



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <h1>Все новости</h1>
                        <div class="row">
                            @foreach ($news as $item)
                                <div class="col-md-6">
                                    <a href="{{ route('news.show',$item) }}"><h4>{{ $item->title }}</h4></a>
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
