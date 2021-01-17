@extends('layouts.admin')

@section('title')
@parent Все категории для редактирования
@endsection



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <h1>Все категории</h1>
                    <div class="row">
                        @foreach ($categories as $item)
                        <div class="col-md-6">
                            <h4>{{ $item->name }}</h4>
                            <a href="{{ route('admin.editCategory', $item) }}">  <button type="button" class="btn btn-success">Edit</button></a>
                            <a href="{{ route('admin.destroyCategory', $item) }}">   <button type="button" class="btn btn-danger">Delete</button></a>
                            <hr/>
                        </div>
                        @endforeach
                    </div>
                    <div>
                        {{ $categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


