@extends('layouts.main')

@section('title')
    @parent Список категорий
@endsection



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <h3>CATEGORIES!</h3>
                        <div class="row">
                            @foreach ($categories as $item)

                                <div class="col-md-4">
                                    <a href="{{ route('news.category.show', $item->slug) }}"><h2>{{ $item->name }}</h2></a>
                                    <a href=" {{ route('news.category.show', $item->slug) }}">
                                        <div class="catalog-item__image" style="background-image:url({{ $item->image??asset('storage/default.jpg') }})" alt="New Image"></div>
                                    </a>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
