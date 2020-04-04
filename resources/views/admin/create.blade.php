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

                        <form method="POST" action="{{ route('admin.create') }}">
                            @csrf

                            <div class="form-group">
                                <label for="newsTitle">Название новости</label>
                                <input name="title" type="text" class="form-control" id="newsTitle" value="{{ old('title') }}">
                            </div>


                            <div class="form-group">
                                <label for="newsCategory">Категория новости</label>
                                <select name="cat_id" class="form-control" id="newsCategory">
                                    @forelse($categories as $item)
                                        <option @if ($item['id'] == old('id')) selected @endif value="{{ $item['id'] }}">
                                            {{ $item['name'] }}</option>
                                        @empty
                                    Нет категрий
                                    @endforelse

                                </select>

                            </div>

                            <div class="form-group">
                                <label for="newsText">Текст новости</label>
                                <textarea name="text" class="form-control" rows="5" id="newsText">{{ old('text') }}</textarea>
                            </div>


                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary" value="Добавить новость"
                                       id="addNews">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

