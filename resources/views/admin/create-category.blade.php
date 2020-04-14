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

                        <form method="POST" enctype="multipart/form-data" action="@if(!$categories->id){{ route('admin.create-category') }}@else{{ route('admin.updateCategory', $categories) }} @endif">
                            @csrf

                            <div class="form-group">
                                <label for="catTitle">Название категории</label>
                                <input name="title" type="text" class="form-control" id="catTitle" value="{{ $categories->name ?? old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="catSlug">Slug</label>
                                <input name="title" type="text" class="form-control" id="catSlug" value="{{ $categories->slug ?? old('slug') }}">
                            </div>



                            <div class="form-group">
                                <label for="catDescription">Описание категории</label>
                                <textarea name="text" class="form-control" rows="5" id="catDescription">{{ $categories->description ?? old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Картинка категории</label><br>
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
@endsection


