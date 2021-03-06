@extends('layouts.admin')

@section('title')
    @parent Создание категории
@endsection



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" enctype="multipart/form-data" action="@if(!$categories->id){{ route('admin.createCategory') }}@else{{ route('admin.updateCategory', $categories) }} @endif">
                            @csrf

                            <div class="form-group">
                                <label for="catTitle">Название категории</label>
                                @if($errors->has('name'))
                                    <div class="alert alert-danger">
                                        @foreach($errors->get('name') as $error)
                                            {{$error}}
                                        @endforeach
                                    </div>
                                @endif
                                <input name="name" type="text" class="form-control" id="catTitle" value="{{ $categories->name ?? old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="catSlug">Slug</label>
                                @if($errors->has('slug'))
                                    <div class="alert alert-danger">
                                        @foreach($errors->get('slug') as $error)
                                            {{$error}}
                                        @endforeach
                                    </div>
                                @endif
                                <input name="slug" type="text" class="form-control" id="catSlug" value="{{ $categories->slug ?? old('slug') }}">
                            </div>



                            <div class="form-group">
                                <label for="catDescription">Описание категории</label>
                                @if($errors->has('description'))
                                    <div class="alert alert-danger">
                                        @foreach($errors->get('description') as $error)
                                            {{$error}}
                                        @endforeach
                                    </div>
                                @endif
                                <textarea name="description" class="form-control" rows="5" id="my-editor">{{ $categories->description ?? old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Картинка категории</label><br>
                                @if($errors->has('image'))
                                    <div class="alert alert-danger">
                                        @foreach($errors->get('image') as $error)
                                            {{$error}}
                                        @endforeach
                                    </div>
                                @endif
                                <input type="file" name="image">
                                @if($categories->image)
                                    <figure class="figure">
                                        <img src="{{$categories->image}}" alt="..." width="200" class="img-thumbnail thumbnail200">
                                        <figcaption class="figure-caption">Текущее изображение</figcaption>
                                    </figure>
                                @endif
                            </div>


                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary" value="@if($categories->id)Изменить @else Добавить @endif категорию"
                                       id="addCat">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>

    <script>
        CKEDITOR.replace('my-editor', options);
    </script>

@endsection


