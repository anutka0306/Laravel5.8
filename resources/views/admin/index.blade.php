@extends('layouts.admin')

@section('title')
    @parent Админка
@endsection



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <a class="nav-link" href="{{ route('admin.news.store') }}">Все Новости</a>
                <a class="nav-link" href="{{ route('admin.categories') }}">Все Категории</a>
            </div>
        </div>
    </div>

@endsection
