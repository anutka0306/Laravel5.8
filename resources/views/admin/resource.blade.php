@extends('layouts.admin')

@section('title')
    @parent Ресурсы для парсинга
@endsection



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <h1>Все ресурсы</h1>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('admin.createRecourse') }}">  <button type="button" class="btn btn-success">Add new recourse</button></a>
                            </div>
                            @foreach ($resource as $item)
                                <div class="col-md-6">
                                    <a href="{{ $item->link }}"> <h5>{{ $item->link }}</h5></a>

                                    <a href="{{ route('admin.destroyRecourse', $item) }}">   <button type="button" class="btn btn-danger">Delete</button></a>
                                    <hr/>
                                </div>
                            @endforeach
                        </div>
                        <div>
                            {{ $resource->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


