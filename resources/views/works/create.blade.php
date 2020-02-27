
@extends('layouts')
@section('content')
<div class="card upper">
        <div class="card-header my-5">
            Добавить Работу
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form method="post" action="{{route('works.store')}}">
                <div class="form-group">
                    @csrf
                    <label for="title">Работа:</label>
                    <input type="text" class="form-control" name="type"/>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
</div>

@endsection