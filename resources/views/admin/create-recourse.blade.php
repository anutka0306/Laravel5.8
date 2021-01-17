@extends('layouts.admin')

@section('title')
    @parent Добавление ресурса для парсинга
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.createRecourse') }}">
                            @csrf

                            <div class="form-group">
                                <label for="link">Ссылка на ресурс</label>
                                @if($errors->has('link'))
                                    <div class="alert alert-danger">
                                        @foreach($errors->get('link') as $error)
                                            {{$error}}
                                        @endforeach
                                    </div>
                                @endif
                                <input name="link" type="text" class="form-control" id="link" value="{{ $recourse->link ?? old('link') }}">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary" value=" Добавить ресурс" id="addRecourse">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection



