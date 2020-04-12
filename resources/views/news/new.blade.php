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
                    <div class="card-header"><small><b>Категория: {{ $category_name }}</b></small></div>
                    <div class="card-body">
                        <h1>{{ $news->title }}</h1>
                        <div class="page__main-image" style="background-image:url({{ $news->image??asset('storage/default.jpg') }})" alt="New Image"></div>
                        <p>{{ $news->text }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

