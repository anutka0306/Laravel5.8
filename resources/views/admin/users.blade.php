@extends('layouts.admin')

@section('title')
    @parent Изменение роли пользователей
@endsection



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <h1>Все пользователи</h1>
                        <div class="row">
                            @foreach ($users as $item)
                                <div class="col-md-6">
                                    <h4>{{ $item->name }}</h4>
                                    <small>{{ $item->email }}</small>
                                    @if($item->id == $current_admin->id)
                                        Это ваш аккаунт
                                    @else
                                        <form action="{{ route('admin.updateRole') }}" method="post">
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <input type="hidden" name="isAdmin" value="{{$item->isAdmin}}">
                                            @csrf
                                        @if($item->isAdmin == 0)
                                      <button type="submit" class="btn btn-success">Надначить админом</button>
                                        @else
                                         <button type="submit" class="btn btn-danger">Разжаловать</button>
                                            @endif
                                        </form>
                                    @endif
                                    <hr/>
                                </div>
                            @endforeach
                        </div>
                        <div>
                            {{ $users->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


