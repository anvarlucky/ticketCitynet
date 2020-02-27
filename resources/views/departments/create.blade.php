
@extends('layouts')
@section('content')
<div class="card upper">
        <div class="card-header my-5">
            Добавить Отдел
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

            <form method="post" action="{{route('departments.store')}}">
                <div class="form-group">
                    @csrf
                    <label for="title">Отделы:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
</div>
@endsection