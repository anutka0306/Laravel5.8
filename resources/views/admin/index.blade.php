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
                                    <h4>{{ $item->title }}</h4>
                                  <a href="{{ route('admin.edit', $item) }}">  <button type="button" class="btn btn-success">Edit</button></a>
                                 <a href="{{ route('admin.destroy', $item) }}">   <button type="button" class="btn btn-danger">Delete</button></a>
                                    <hr/>
                                </div>
                            @endforeach
                        </div>
                        <div>
                        {{ $news->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
