@extends('layouts.admin')

@section('title')
    @parent Создание новости
@endsection



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" enctype="multipart/form-data" action="@if(!$news->id){{ route('admin.news.store') }}@else{{ route('admin.news.update', $news) }} @endif">
                            @csrf
                            @if($news->id) @method('PATCH') @endif
                            <div class="form-group">
                                <label for="newsTitle">Название новости</label>
                                @if($errors->has('title'))
                                    <div class="alert alert-danger">
                                        @foreach($errors->get('title') as $error)
                                            {{$error}}
                                            @endforeach
                                    </div>
                                @endif
                                <input name="title" type="text" class="form-control" id="newsTitle" value="{{ $news->title ?? old('title') }}">
                            </div>


                            <div class="form-group">
                                <label for="newsCategory">Категория новости</label>
                                <select name="category_id" class="form-control" id="newsCategory">
                                    @forelse($categories as $item)
                                        <option @if($news->category_id && $news->category_id==$item->id)
                                                @if ($item->id == old('id')) selected
                                                @endif
                                                selected @endif
                                                value="{{ $item->id }}">
                                            {{ $item->name }}</option>
                                        @empty
                                    Нет категрий
                                    @endforelse

                                </select>

                            </div>

                            <div class="form-group">
                                <label for="newsText">Текст новости</label>
                                @if($errors->has('text'))
                                    <div class="alert alert-danger">
                                        @foreach($errors->get('text') as $error)
                                            {{$error}}
                                        @endforeach
                                    </div>
                                @endif
                                <textarea name="text" class="form-control" rows="5" id="newsText">{{ $news->text ?? old('text') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Картинка новости</label><br>
                                @if($errors->has('image'))
                                    <div class="alert alert-danger">
                                        @foreach($errors->get('image') as $error)
                                            {{$error}}
                                        @endforeach
                                    </div>
                                @endif
                                <input type="file" name="image">
                                @if($news->image)
                                    <figure class="figure">
                                    <img src="{{$news->image}}" alt="..." width="200" class="img-thumbnail thumbnail200">
                                        <figcaption class="figure-caption">Текущее изображение</figcaption>
                                    </figure>
                                    @endif
                            </div>


                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary" value="@if($news->id)Изменить @else Добавить @endif новость"
                                       id="addNews">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

